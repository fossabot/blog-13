<?php

namespace App\Models;

use App\Repositories\Slug\HasSlug;
use App\Repositories\Slug\SlugOptions;
use Eloquent;
use Exception;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $slug
 * @property null|int $parent_id
 * @property null|int $order_column
 * @property string $title
 * @property null|string $subtitle
 * @property string $description
 * @property null|string $deleted_at
 * @property null|Carbon $created_at
 * @property null|Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereOrderColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read Category[]|Collection $children
 * @property-read null|int $children_count
 * @property-read \Category $first_child
 * @property-read \Category[]|Collection $siblings
 * @property-read mixed $url
 * @property-read null|Category $parent
 * @property-read Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read null|int $permissions_count
 * @property-read Post[]|Collection $posts
 * @property-read null|int $posts_count
 * @property-read Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read null|int $roles_count
 * @method static bool|null forceDelete()
 * @method static Builder|Category onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Category permission($permissions)
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|Category role($roles, $guard = null)
 * @method static Builder|Category withTrashed()
 * @method static Builder|Category withoutTrashed()
 * @property-read Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read Collection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
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
     * Generate slug form from title field
     *
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
     * @return UrlGenerator|string
     */
    public function getUrlAttribute(): string
    {
        return url("category/{$this->slug}");
    }
    /**
     * Category has children
     *
     * @return HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id')
            ->orderBy('order_column');
    }

    /**
     * Count category if have children
     *
     * @return bool
     */
    public function hasChildren(): bool
    {
        return count($this->children);
    }

    /**
     * @throws Exception
     * @return Category
     */
    public function getFirstChildAttribute(): self
    {
        if (! $this->hasChildren()) {
            throw new Exception("Category `{$this->title}` doesn't have any children.");
        }

        return $this->children->sortBy('order_column')->first();
    }

    /**
     * @return Category[]|Collection
     */
    public function getSiblingsAttribute()
    {
        return self::where('parent_id', $this->parent_id)
            ->orderBy('order_column')
            ->get();
    }

    /**
     * Parent of children
     *
     * @return BelongsTo
     */
    public function parent(): BelongsTo
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
     * @return HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'category_id');
    }
}
