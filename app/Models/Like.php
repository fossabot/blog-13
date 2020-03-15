<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\Like
 *
 * @property int $id
 * @property int $user_id
 * @property null|string $likeable_type
 * @property null|int $likeable_id
 * @property null|\Illuminate\Support\Carbon $created_at
 * @property null|\Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\User $author
 * @property-read \Eloquent|\Illuminate\Database\Eloquent\Model $likeable
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Like newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Like newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Like query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Like whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Like whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Like whereLikeableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Like whereLikeableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Like whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Like whereUserId($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 */
class Like extends Model
{
    use LogsActivity;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'likeable_id',
        'likeable_type',
        'user_id',
    ];

    /**
     * Get all of the owning likeable models.
     */
    public function likeable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Return the like's author
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
