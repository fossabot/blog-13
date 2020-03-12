<?php

namespace App\Models;

use App\Repositories\Slug\HasSlug;
use App\Repositories\Slug\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $slug
 * @property int|null $parent_id
 * @property int|null $order_column
 * @property string $title
 * @property string|null $subtitle
 * @property string $description
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereOrderColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $children
 * @property-read int|null $children_count
 * @property-read \Category $first_child
 * @property-read \Category[]|\Illuminate\Database\Eloquent\Collection $siblings
 * @property-read mixed $url
 * @property-read \App\Models\Category|null $parent
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $posts
 * @property-read int|null $posts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category permission($permissions)
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category role($roles, $guard = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category withoutTrashed()
 */
class Category extends Model
{
    use SoftDeletes, HasRoles, LogsActivity, HasSlug;

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'parent_id',
        'order_column',
        'subtitle',
        'description'
    ];

    /**
     * @return SlugOptions
     */
    public function getSlugOptions(): SlugOptions
    {
        // TODO: Implement getSlugOptions() method.
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function getUrlAttribute()
    {
        return url("category/{$this->slug}");
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id')->orderBy('order_column');
    }

    /**
     * @return bool
     */
    public function hasChildren(): bool
    {
        return count($this->children);
    }

    /**
     * @throws \Exception
     * @return Category
     */
    public function getFirstChildAttribute(): self
    {
        if (! $this->hasChildren()) {
            throw new \Exception("Category `{$this->title}` doesn't have any children.");
        }

        return $this->children->sortBy('order_column')->first();
    }

    /**
     * @return Category[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getSiblingsAttribute()
    {
        return self::where('parent_id', $this->parent_id)
            ->orderBy('order_column')
            ->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    /**
     * check if model has parent
     *
     * @return bool
     */
    public function hasParent(): bool
    {
        return ! is_null($this->parent_id);
    }

    /**
     * one to many polymorphic relation category model and other models
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'category_id');
    }
}
