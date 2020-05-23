<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 */

namespace App\Models;

use App\Libraries\DateAttribute\DateAttributeInterface;
use App\Libraries\DateAttribute\DateAttributeTrait;
use App\Libraries\Like\Likeable;
use App\Libraries\Post\ImageAttribute;
use App\Libraries\Post\ReadTime\ReadTime;
use App\Libraries\Slug\HasSlug;
use App\Libraries\Slug\SlugOptions;
use App\Libraries\Tag\HasTags;
use App\Scopes\PostedScope;
use Illuminate\Contracts\Routing\UrlRoutable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use League\CommonMark\CommonMarkConverter;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\Post
 *
 * @property int $id
 * @property int $category_id
 * @property int $user_id
 * @property null|int $parent_id
 * @property string $slug
 * @property string $title
 * @property null|string $subtitle
 * @property null|string $meta_description
 * @property null|string $content_raw
 * @property string $content_html
 * @property string $is_draft
 * @property string $is_sticky
 * @property string $type
 * @property \Illuminate\Support\Carbon $published_at
 * @property string $layout
 * @property null|\Illuminate\Support\Carbon $deleted_at
 * @property null|\Illuminate\Support\Carbon $created_at
 * @property null|\Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Activity[]|\Illuminate\Database\Eloquent\Collection $activities
 * @property-read null|int $activities_count
 * @property-read \App\Models\Category $category
 * @property-read \App\Models\Post[]|\Illuminate\Database\Eloquent\Collection $children
 * @property-read null|int $children_count
 * @property-read \App\Models\Comment[]|\Illuminate\Database\Eloquent\Collection $comments
 * @property-read null|int $comments_count
 * @property-read string $author
 * @property-read mixed $content
 * @property-read string $cover
 * @property-read string $date
 * @property-read string $excerpt
 * @property-read \Post $first_child
 * @property-read string $image
 * @property-read string $month
 * @property-read mixed $publish
 * @property-read mixed $publish_date
 * @property-read mixed $publish_time
 * @property-read \ReadTime $read_time
 * @property-read \Collection|\Post[] $siblings
 * @property-read string $slide_index
 * @property-read string $slide_show
 * @property-read string $thumbnail
 * @property-read string $time_elapsed
 * @property-read string $url
 * @property-read \App\Models\Like[]|\Illuminate\Database\Eloquent\Collection $likes
 * @property-read null|int $likes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read null|int $media_count
 * @property-read null|\App\Models\Post $parent
 * @property-read \App\Models\Permission[]|\Illuminate\Database\Eloquent\Collection $permissions
 * @property-read null|int $permissions_count
 * @property-read \App\Models\Rate[]|\Illuminate\Database\Eloquent\Collection $rates
 * @property-read null|int $rates_count
 * @property-read \App\Models\Role[]|\Illuminate\Database\Eloquent\Collection $roles
 * @property-read null|int $roles_count
 * @property \App\Models\Tag[]|\Illuminate\Database\Eloquent\Collection $tags
 * @property-read null|int $tags_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post lastMonth($limit = 5)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post lastWeek()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post latest()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Post onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post search($search)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereContentHtml($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereContentRaw($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereIsDraft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereIsSticky($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereLayout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post withAllTags($tags, $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post withAllTagsOfAnyType($tags)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post withAnyTags($tags, $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post withAnyTagsOfAnyType($tags)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Post withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Post withoutTrashed()
 * @mixin \Eloquent
 */
class Post extends Model implements HasMedia, UrlRoutable, DateAttributeInterface
{
    use HasRoles,
        InteractsWithMedia,
        SoftDeletes,
        Likeable,
        LogsActivity,
        HasSlug,
        HasTags,
        ImageAttribute,
        DateAttributeTrait;

    /**
     * @var array
     */
    protected $dates = ['published_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'parent_id',
        'type',
        'title',
        'subtitle',
        'type',
        'order_column',
        'content_raw',
        'meta_description',
        'status',
        'published_at',
    ];

    /**
     * @param null|Media $media
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('xs')
            ->crop('crop-center', 90, 80)
            ->width(90)
            ->height(80)
            ->sharpen(10)
            ->optimize()
            ->quality(80)
            ->withResponsiveImages();

        $this->addMediaConversion('sm')
//            ->crop('crop-center', 690, 504)
            ->width(690)
            ->height(504)
            ->sharpen(10)
            ->optimize()
            ->quality(80)
            ->withResponsiveImages();

        $this->addMediaConversion('md')
//            ->crop('crop-center', 810, 480)
            ->width(810)
            ->height(480)
            ->sharpen(10)
            ->optimize()
            ->quality(80)
            ->withResponsiveImages();

        $this->addMediaConversion('lg')
//            ->crop('crop-center', 870, 448)
            ->width(870)
            ->height(448)
            ->sharpen(10)
            ->optimize()
            ->quality(80)
            ->withResponsiveImages();

        $this->addMediaConversion('xl')
//            ->crop('crop-center', 1170, 600)
            ->width(1170)
            ->height(600)
            ->sharpen(10)
            ->optimize()
            ->quality(80)
            ->withResponsiveImages();

        $this->addMediaConversion('slider-index')
//            ->crop('crop-center', 1171, 568)
            ->width(1171)
            ->height(568)
            ->sharpen(10)
            ->optimize()
            ->quality(80)
            ->withResponsiveImages();

        $this->addMediaConversion('slider-show')
//            ->crop('crop-center', 1920, 700)
            ->width(1920)
            ->height(700)
            ->sharpen(10)
            ->optimize()
            ->quality(80)
            ->withResponsiveImages();

        $this->addMediaConversion('original')
            ->fit(Manipulations::FIT_FILL, 1920, 1080)
            ->optimize()
            ->quality(80)
            ->withResponsiveImages();
    }

    /**
     * The "booting" method of the model.
     */
    protected static function boot(): void
    {
        parent::boot();
        static::addGlobalScope(new PostedScope);
    }

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
     * Prepare a date for array / JSON serialization.
     *
     * @param \DateTimeInterface $date
     * @return string
     */
    protected function serializeDate(\DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        if (request()->expectsJson()) {
            return 'id';
        }

        return 'slug';
    }

    /**
     * Return URL to post
     *
     * @return string
     */
    public function getUrlAttribute(): string
    {
        switch ($this->type) {
            case 'page':
                return url($this->slug);
                break;
            default:
                return url($this->type .'/'.$this->slug);
        }
    }

    /**
     * Scope a query to search posts
     *
     * @param Builder $query
     * @param null|string $search
     * @return Builder
     */
    public function scopeSearch(Builder $query, ?string $search)
    {
        if ($search) {
            return $query->where('title', 'LIKE', "%{$search}%")
                ->orWhere('content_raw', 'LIKE', "%{$search}%");
        }
    }

    /**
     * Creating new query databases with relations
     *
     * @param Builder $query
     * @param array $relation
     * @return Builder
     */
    public function queryAll(Builder $query, array $relation = []): Builder
    {
        return $query->where('published_at', '<=', now())
            ->where('is_draft', 0)
            ->orderBy('published_at', 'desc')
            ->with($relation);
    }

    /**
     * @param string $model
     * @param array $relation
     * @param int $id
     * @param int $limit
     * @return Collection
     */
    public function queryFilter(string $model, array $relation, int $id, int $limit)
    {
        return $this->queryAll($relation)->filter(function ($post) use ($model, $id) {
            return $post->postable_type = $model && $post->postable_id == $id;
        })->take($limit);
    }



    /**
     * set content raw markdown to convert to html with Parsedown
     *
     * @param $value
     * @throws \Exception
     * @return string
     */
    public function setContentRawAttribute($value)
    {
        $this->attributes['content_raw'] = $value;
        $this->attributes['content_html'] = $this->markdown($value);
    }

    /**
     * get content attribute
     *
     * @return mixed
     */
    public function getContentAttribute(): string
    {
        return $this->content_html;
    }

    /**
     * return the excerpt of the post content
     *
     * @throws \Exception
     * @return string
     */
    public function getExcerptAttribute(): string
    {
        $text = \Str::limit($this->content_raw);
        return $this->markdown($text);
    }

    /**
     * @throws \Exception
     * @return ReadTime
     */
    public function getReadTimeAttribute(): ReadTime
    {
        $content = $this->content_html;
        $omitSeconds = config('blog.omit_seconds');
        $timeOnly = config('blog.time_only');
        $abbreviated = config('blog.abbreviate_time_measurements');
        $wordsPerMinute = config('blog.words_per_minute');
        $ltr =  __('read-time.reads_left_to_right');
        $translation =  __('read-time');

        return (new ReadTime($content))
            ->omitSeconds($omitSeconds)
            ->timeOnly($timeOnly)
            ->abbreviated($abbreviated)
            ->wpm($wordsPerMinute)
            ->ltr($ltr)
            ->setTranslation($translation);
    }




    /**
     * Define a one-to-many relationship.
     *
     * @return HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id')
            ->orderBy('order_column');
    }

    /**
     * check if model has Children
     *
     * @return bool
     */
    public function hasChildren(): bool
    {
        return count($this->children);
    }

    /**
     * get first element children models
     *
     * @throws \Exception
     * @return Post
     */
    public function getFirstChildAttribute(): self
    {
        if (! $this->hasChildren()) {
            throw new \Exception("Article `{$this->title}` doesn't have any children.");
        }

        return $this->children->sortBy('order_column')->first();
    }

    /**
     * get sibling attribute
     *
     * @return Collection|Post[]
     */
    public function getSiblingsAttribute()
    {
        return self::where('parent_id', $this->parent_id)
            ->orderBy('order_column')
            ->get();
    }

    /**
     * @return BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    /**
     * Check if parent is exist or not null
     *
     * @return bool
     */
    public function hasParent(): bool
    {
        return ! is_null($this->parent_id);
    }

    /**
     * one to many relationship between user and posts
     * example: $post->user->name
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get Author name from table user
     *
     * @return string
     */
    public function getAuthorAttribute(): string
    {
        if (!empty($this->user)) {
            return $this->user->name;
        }
    }


    /**
     * Define an inverse one-to-one or many relationship.
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Define a one-to-many relationship.
     *
     * @return HasMany
     */
    public function rates(): HasMany
    {
        return $this->hasMany(Rate::class, 'post_id');
    }

    /**
     * Return the post's comments
     * Define a polymorphic one-to-many relationship.
     *
     * @return MorphMany
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'comment');
    }

    /**
     * Convert markdown to HTML
     *
     * @param string $text
     * @return string
     */
    private function markdown(string $text): string
    {
        try {
            $markdown = new CommonMarkConverter();
            return $markdown->convertToHtml($text);
        } catch (\Exception $exception) {
            $exception->getMessage();
        }
    }
}
