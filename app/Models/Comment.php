<?php

namespace App\Models;

use Carbon\Carbon;
use Eloquent;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\Comment
 *
 * @property-read User $author
 * @property-read Eloquent|Model $commentable
 * @property-read Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read null|int $permissions_count
 * @property-read Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read null|int $roles_count
 * @method static bool|null forceDelete()
 * @method static Builder|Comment lastWeek()
 * @method static Builder|Comment latest()
 * @method static Builder|Comment newModelQuery()
 * @method static Builder|Comment newQuery()
 * @method static \Illuminate\Database\Query\Builder|Comment onlyTrashed()
 * @method static Builder|Comment permission($permissions)
 * @method static Builder|Comment query()
 * @method static bool|null restore()
 * @method static Builder|Comment role($roles, $guard = null)
 * @method static \Illuminate\Database\Query\Builder|Comment withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Comment withoutTrashed()
 * @mixin Eloquent
 * @property int $id
 * @property int $user_id
 * @property null|int $parent_id
 * @property null|string $title
 * @property string $body
 * @property null|string $commentable_type
 * @property null|int $commentable_id
 * @property null|\Illuminate\Support\Carbon $published_at
 * @property int $approved
 * @property null|\Illuminate\Support\Carbon $deleted_at
 * @property null|\Illuminate\Support\Carbon $created_at
 * @property null|\Illuminate\Support\Carbon $updated_at
 * @method static Builder|Comment whereApproved($value)
 * @method static Builder|Comment whereBody($value)
 * @method static Builder|Comment whereCommentableId($value)
 * @method static Builder|Comment whereCommentableType($value)
 * @method static Builder|Comment whereCreatedAt($value)
 * @method static Builder|Comment whereDeletedAt($value)
 * @method static Builder|Comment whereId($value)
 * @method static Builder|Comment whereParentId($value)
 * @method static Builder|Comment wherePublishedAt($value)
 * @method static Builder|Comment whereTitle($value)
 * @method static Builder|Comment whereUpdatedAt($value)
 * @method static Builder|Comment whereUserId($value)
 * @property-read Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read null|int $activities_count
 * @property string $content
 * @property-read User $user
 * @method static Builder|Comment whereContent($value)
 * @property string|null $comment_type
 * @property int|null $comment_id
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $comment
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereCommentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereCommentType($value)
 */
class Comment extends Model
{
    use SoftDeletes, LogsActivity, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'parent_id',
        'title',
        'content',
        'published_at'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'published_at'
    ];

    /**
     * Scope a query to only include comments posted last week.
     * @param Builder $query
     * @throws Exception
     * @return Builder
     */
    public function scopeLastWeek(Builder $query): Builder
    {
        return $query->whereBetween('published_at', [Carbon::now()->subWeek(), Carbon::now()])
            ->latest();
    }

    /**
     * Scope a query to order comments by latest posted.
     * @param Builder $query
     * @return Builder
     */
    public function scopeLatest(Builder $query): Builder
    {
        return $query->orderBy('published_at', 'desc');
    }

    /**
     * Return the comment's author
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Return the comment's post
     * Many to one polymorphic relationship between comments and post
     *
     * @return MorphTo
     */
    public function comment(): MorphTo
    {
        return $this->morphTo();
    }
}
