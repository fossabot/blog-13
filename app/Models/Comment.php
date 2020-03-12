<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\Comment
 *
 * @property-read \App\Models\User $author
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $commentable
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment lastWeek()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment latest()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Comment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment role($roles, $guard = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Comment withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Comment withoutTrashed()
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property int|null $parent_id
 * @property string|null $title
 * @property string $body
 * @property string|null $commentable_type
 * @property int|null $commentable_id
 * @property \Illuminate\Support\Carbon|null $published_at
 * @property int $approved
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereCommentableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereCommentableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereUserId($value)
 */
class Comment extends Model
{
    use SoftDeletes, LogsActivity, HasRoles;

    protected $fillable = [
        'user_id',
        'parent_id',
        'title',
        'body',
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
     * @throws \Exception
     * @return Builder
     */
    public function scopeLastWeek(Builder $query): Builder
    {
        return $query->whereBetween('published_at', [Carbon::now()->subWeek(1), Carbon::now()])
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
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Return the comment's post
     * Many to one polymorphic relationship between comments and post
     *
     * @return MorphTo
     */
    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }
}
