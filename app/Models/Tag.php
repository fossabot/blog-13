<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 */

namespace App\Models;

use App\Libraries\Sortable\Sortable;
use Illuminate\Database\Query\Builder;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use App\Libraries\Sortable\SortableTrait;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * App\Models\Tag.
 *
 * @property int $id
 * @property string $tag
 * @property string $title
 * @property string $subtitle
 * @property string $meta_description
 * @property string $layout
 * @property null|string $type
 * @property null|int $order_column
 * @property null|\Illuminate\Support\Carbon $created_at
 * @property null|\Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Activity[]|\Illuminate\Database\Eloquent\Collection $activities
 * @property-read null|int $activities_count
 * @property-read string $url
 * @property-read \App\Models\Permission[]|\Illuminate\Database\Eloquent\Collection $permissions
 * @property-read null|int $permissions_count
 * @property-read \App\Models\Post[]|\Illuminate\Database\Eloquent\Collection $post
 * @property-read null|int $post_count
 * @property-read \App\Models\Role[]|\Illuminate\Database\Eloquent\Collection $roles
 * @property-read null|int $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag containing($name, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tag onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereLayout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereOrderColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tag withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag withType($type = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tag withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag ordered($direction = 'asc')
 */
class Tag extends Model implements Sortable
{
    use HasRoles, LogsActivity, SortableTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tag', 'title', 'subtitle', 'meta_description',
    ];

    /**
     * Return URL to post.
     *
     * @return string
     */
    public function getUrlAttribute(): string
    {
        return '?tag='.urlencode($this->tag);
    }

    /**
     * many to many polymorphic relationship between posts and tags.
     *
     * @return MorphToMany
     */
    public function post(): MorphToMany
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }

    /**
     * Add any tags needed from the list.
     *
     * @param array $tags List of tags to check/add
     */
    public static function addNeededTags(array $tags)
    {
        if (count($tags) === 0) {
            return;
        }

        $found = static::whereIn('tag', $tags)->pluck('tag', 'id')->toArray();

        foreach (array_diff($tags, $found) as $tag) {
            static::create([
                'tag' => $tag,
                'title' => $tag,
                'subtitle' => 'Subtitle for '.$tag,
                'meta_description' => '',
            ]);
        }
    }

    /**
     * @param Builder $query
     * @param null|string $type
     * @return Builder
     */
    public function scopeWithType(Builder $query, string $type = null): Builder
    {
        if (is_null($type)) {
            return $query;
        }

        return $query->where('type', $type)->ordered();
    }

    /**
     * @param Builder $query
     * @param string $name
     * @param null $locale
     * @return Builder
     */
    public function scopeContaining(Builder $query, string $name, $locale = null): Builder
    {
        $locale = $locale ?? app()->getLocale();

        return $query->whereRaw('lower('.$this->getQuery()->getGrammar()->wrap('name->'.$locale).') like ?', ['%'.mb_strtolower($name).'%']);
    }

    /**
     * @param $values
     * @param null|string $type
     * @param null|string $locale
     * @return \Illuminate\Support\Collection|mixed
     */
    public static function findOrCreate($values, string $type = null, string $locale = null)
    {
        $tags = collect($values)->map(function ($value) use ($type, $locale) {
            if ($value instanceof self) {
                return $value;
            }

            return static::findOrCreateFromString($value, $type, $locale);
        });

        return is_string($values) ? $tags->first() : $tags;
    }

    /**
     * @param string $type
     * @return Collection
     */
    public static function getWithType(string $type): Collection
    {
        return static::withType($type)->ordered()->get();
    }

    /**
     * @param string $name
     * @param null|string $type
     * @param null|string $locale
     * @return null|\Illuminate\Database\Eloquent\Builder|Model|object
     */
    public static function findFromString(string $name, string $type = null, string $locale = null)
    {
        $locale = $locale ?? app()->getLocale();

        return static::query()
            ->where("name->{$locale}", $name)
            ->where('type', $type)
            ->first();
    }

    /**
     * @param string $name
     * @param null|string $locale
     * @return null|\Illuminate\Database\Eloquent\Builder|Model|object
     */
    public static function findFromStringOfAnyType(string $name, string $locale = null)
    {
        $locale = $locale ?? app()->getLocale();

        return static::query()
            ->where("name->{$locale}", $name)
            ->first();
    }

    /**
     * @param string $name
     * @param null|string $type
     * @param null|string $locale
     * @return \Illuminate\Database\Eloquent\Builder|Model|object|Tag
     */
    protected static function findOrCreateFromString(string $name, string $type = null, string $locale = null)
    {
        $locale = $locale ?? app()->getLocale();

        $tag = static::findFromString($name, $type, $locale);

        if (! $tag) {
            $tag = static::create([
                'name' => [$locale => $name],
                'type' => $type,
            ]);
        }

        return $tag;
    }
}
