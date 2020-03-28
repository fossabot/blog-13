<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Spatie\Activitylog\Models\Activity as Model;

/**
 * App\Models\Activity
 *
 * @property int $id
 * @property string|null $log_name
 * @property string $description
 * @property int|null $subject_id
 * @property string|null $subject_type
 * @property int|null $causer_id
 * @property string|null $causer_type
 * @property Collection|null $properties
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|Eloquent $causer
 * @property-read mixed $changes
 * @property-read \Illuminate\Database\Eloquent\Model|Eloquent $subject
 * @method static Builder|Model causedBy(\Illuminate\Database\Eloquent\Model $causer)
 * @method static Builder|Model forSubject(\Illuminate\Database\Eloquent\Model $subject)
 * @method static Builder|Model inLog($logNames)
 * @method static Builder|Activity newModelQuery()
 * @method static Builder|Activity newQuery()
 * @method static Builder|Activity query()
 * @method static Builder|Activity whereCauserId($value)
 * @method static Builder|Activity whereCauserType($value)
 * @method static Builder|Activity whereCreatedAt($value)
 * @method static Builder|Activity whereDescription($value)
 * @method static Builder|Activity whereId($value)
 * @method static Builder|Activity whereLogName($value)
 * @method static Builder|Activity whereProperties($value)
 * @method static Builder|Activity whereSubjectId($value)
 * @method static Builder|Activity whereSubjectType($value)
 * @method static Builder|Activity whereUpdatedAt($value)
 * @mixin Eloquent
 * @method static Builder|Model forEvent($event)
 * @property string|null $event
 * @method static Builder|Activity whereEvent($value)
 */
class Activity extends Model
{
    /**
     * @return HasOne
     */
    public function getUser(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'causer_id');
    }

    /**
     * @return HasOne
     */
    public function getSubject(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'causer_id');
    }
}
