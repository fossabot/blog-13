<?php

namespace App\Models\Users;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Users\Education
 *
 * @property int $id
 * @property int $user_id
 * @property int $education_stage_id
 * @property string $institution
 * @property string $academic_year
 * @property string $academic_major
 * @property string $academic_title
 * @property int $graduated
 * @property int $certified
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Education newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Education newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Education query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Education whereAcademicMajor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Education whereAcademicTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Education whereAcademicYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Education whereCertified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Education whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Education whereEducationStageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Education whereGraduated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Education whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Education whereInstitution($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Education whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Education whereUserId($value)
 * @mixin \Eloquent
 */
class Education extends Model
{
    /**
     * @var string
     */
    protected $table = 'users_education';

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return  $this->belongsTo(User::class, 'user_id');
    }
}
