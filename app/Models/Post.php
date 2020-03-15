<?php

namespace App\Models;

use App\Repositories\Likeable;
use App\Repositories\ReadTime;
use App\Repositories\Slug\HasSlug;
use App\Repositories\Slug\SlugOptions;
use App\Scopes\PostedScope;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\Activitylog\Traits\LogsActivity;
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
 * @property string $subtitle
 * @property string $meta_description
 * @property string $content_raw
 * @property string $content_html
 * @property string $is_draft
 * @property string $type
 * @property string $published_at
 * @property null|string $deleted_at
 * @property null|\Illuminate\Support\Carbon $created_at
 * @property null|\Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereContentHtml($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereContentRaw($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereIsDraft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereUserId($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Category $category
 * @property-read \App\Models\Post[]|\Illuminate\Database\Eloquent\Collection $children
 * @property-read null|int $children_count
 * @property-read \App\Models\Comment[]|\Illuminate\Database\Eloquent\Collection $comments
 * @property-read null|int $comments_count
 * @property-read mixed $content
 * @property-read string $date
 * @property-read string $excerpt
 * @property-read \Post $first_child
 * @property-read \Illuminate\Contracts\Routing\UrlGenerator|string $image
 * @property-read string $month
 * @property-read mixed $publish_date
 * @property-read mixed $publish_time
 * @property-read \ReadTime $read_time
 * @property-read \Illuminate\Database\Eloquent\Collection|\Post[] $siblings
 * @property-read string $time_elapsed
 * @property-read string $url
 * @property-read \App\Models\Like[]|\Illuminate\Database\Eloquent\Collection $likes
 * @property-read null|int $likes_count
 * @property-read null|\App\Models\Post $parent
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read null|int $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read null|int $roles_count
 * @property-read \App\Models\Tag[]|\Illuminate\Database\Eloquent\Collection $tags
 * @property-read null|int $tags_count
 * @property-read \App\Models\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post lastMonth($limit = 5)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post lastWeek()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post latest()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Post onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post permission($permissions)
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post search($search)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Post withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Post withoutTrashed()
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\MediaLibrary\Models\Media[] $media
 * @property-read null|int $media_count
 */
class Post extends Model
{
    use HasRoles, HasSlug, SoftDeletes, Likeable, LogsActivity;
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
     * The "booting" method of the model.
     */
    protected static function boot(): void
    {
        parent::boot();
        static::addGlobalScope(new PostedScope);
    }

    /**
     * Prepare a date for array / JSON serialization.
     * @param DateTimeInterface $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        if (request()->expectsJson()) {
            return 'id';
        }

        return 'slug';
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
     * @param $value
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function getImageAttribute($value)
    {
        $file =  \Storage::url("images/{$value}");
        return url($file);
    }

    /**
     * @param $value
     * @return string
     */
    public function getUrlAttribute()
    {
        return route('blog.show', $this->slug);
    }


    /**
     * @param $value
     * @return string
     */
    public function getPublishedAtAttribute($value)
    {
        return $this->attributes['published_at'] = Carbon::parse($value)->format('d, M Y');
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
            return $query->where('title', 'LIKE', "%{$search}%");
        }
    }

    /**
     * Creating new query databases with relations
     *
     * @param array $relation
     * @return Builder[]|\Illuminate\Database\Eloquent\Collection|Post[]
     */
    public function queryAll(array $relation = [])
    {
        $queries = static::where('published_at', '<=', now())
            ->where('is_draft', 0)
            ->orderBy('published_at', 'desc')
            ->with($relation)
            ->get();

        return $queries;
    }

    /**
     * @param string $model
     * @param array $relation
     * @param int $id
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function queryFilter(string $model, array $relation, int $id, int $limit)
    {
        $query = $this->queryAll($relation)->filter(function ($post) use ($model, $id) {
            return $post->postable_type = $model && $post->postable_id == $id;
        })->take($limit);
        return $query;
    }

    /**
     * Scope a query to order posts by latest posted
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeLatest(Builder $query): Builder
    {
        return $query->orderBy('published_at', 'desc');
    }

    /**
     * Scope a query to only include posts posted last month.
     *
     * @param Builder $query
     * @param int $limit
     * @return Builder
     */
    public function scopeLastMonth(Builder $query, int $limit = 5): Builder
    {
        return $query->whereBetween('published_at', [Carbon::now()->subMonth(), Carbon::now()])
            ->latest()
            ->limit($limit);
    }

    /**
     * Scope a query to only include posts posted last week.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeLastWeek(Builder $query): Builder
    {
        return $query->whereBetween('published_at', [Carbon::now()->subWeeks(1), now()])
            ->latest();
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
        return $this->content_raw;
    }

    /**
     * return the excerpt of the post content
     *
     * @param int $length
     * @throws \Exception
     * @return string
     */
    public function getExcerptAttribute(): string
    {
        $text = Str::limit($this->content_raw);
        return $this->markdown($text);
    }

    /**
     * @return ReadTime
     */
    public function getReadTimeAttribute()
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
     * get publish date attribute
     *
     * @param $value
     * @throws \Exception
     * @return mixed
     */
    public function getPublishDateAttribute($value): string
    {
        return $this->attributes['published_at'] = Carbon::parse($value)->format('M-J-Y');
    }

    /**
     * get publish time attribute
     *
     * @param $value
     * @throws \Exception
     * @return mixed
     */
    public function getPublishTimeAttribute($value): string
    {
        return $this->attributes['published_at'] = Carbon::parse($value)->format('g:i A');
    }

    /**
     * @param $value
     * @return string
     */
    public function getDateAttribute($value): string
    {
        return $this->attributes['published_at'] = Carbon::parse($value)->format('d');
    }

    /**
     * @param $value
     * @return string
     */
    public function getMonthAttribute($value): string
    {
        return $this->attributes['published_at'] = Carbon::parse($value)->format('M');
    }

    /**
     * @param $value
     * @return string
     */
    public function getTimeElapsedAttribute($value): string
    {
        return $this->attributes['published_at'] = Carbon::parse($value)->diffForHumans();
    }



    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
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
     * @return \Illuminate\Database\Eloquent\Collection|Post[]
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
    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    /**
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getAuthorAttribute()
    {
        if (!empty($this->user)) {
            return $this->user->name;
        }
    }

    /**
     * many to many polymorphic relationship between tags and posts
     * every post has one or many tags
     * example:
     *
     * @foreach($post->tags as $tag)
     * $tag->title
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Return the post's comments
     *
     * @return MorphMany
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }



    /**
     * @param string $text
     * @throws \Exception
     * @return string
     */
    private function markdown(string $text): string
    {
        $markdown = new \League\CommonMark\CommonMarkConverter();
        return $markdown->convertToHtml($text);
    }
}
