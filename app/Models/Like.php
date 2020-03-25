<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Carbon;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\Like
 *
 * @property int $id
 * @property int $user_id
 * @property null|string $likeable_type
 * @property null|int $likeable_id
 * @property null|Carbon $created_at
 * @property null|Carbon $updated_at
 * @property-read User $author
 * @property-read Eloquent|Model $likeable
 * @method static Builder|Like newModelQuery()
 * @method static Builder|Like newQuery()
 * @method static Builder|Like query()
 * @method static Builder|Like whereCreatedAt($value)
 * @method static Builder|Like whereId($value)
 * @method static Builder|Like whereLikeableId($value)
 * @method static Builder|Like whereLikeableType($value)
 * @method static Builder|Like whereUpdatedAt($value)
 * @method static Builder|Like whereUserId($value)
 * @mixin Eloquent
 * @property-read Collection|\Spatie\Activitylog\Models\Activity[] $activities
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
