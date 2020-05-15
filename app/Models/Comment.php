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
use App\Libraries\Like\LikeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\Comment
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $parent_id
 * @property string|null $title
 * @property string $content
 * @property string|null $comment_type
 * @property int|null $comment_id
 * @property \Illuminate\Support\Carbon|null $published_at
 * @property int $approved
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read string $date
 * @property-read string $month
 * @property-read mixed $publish_date
 * @property-read mixed $publish_time
 * @property-read string $time_elapsed
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $post
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \App\Models\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment lastMonth($limit = 5)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment lastWeek()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment latest()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Comment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereCommentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereCommentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Comment withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Comment withoutTrashed()
 * @mixin \Eloquent
 * @property-read mixed $publish
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Like[] $likes
 * @property-read int|null $likes_count
 */
class Comment extends Model implements DateAttributeInterface, LikeInterface
{
    use SoftDeletes, Likeable, LogsActivity, HasRoles, DateAttributeTrait;

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
     * Return the comment's user
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
    public function post(): MorphTo
    {
        return $this->morphTo();
    }
}
