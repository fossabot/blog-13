<?php

namespace App\Models\Users;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Users\Experience
 *
 * @property int $id
 * @property int $user_id
 * @property string $company_name
 * @property string $company_department
 * @property string $company_department_position
 * @property string $date_start
 * @property string $date_end
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Experience newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Experience newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Experience query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Experience whereCompanyDepartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Experience whereCompanyDepartmentPosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Experience whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Experience whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Experience whereDateEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Experience whereDateStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Experience whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Experience whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Experience whereUserId($value)
 * @mixin \Eloquent
 */
class Experience extends Model
{
    /**
     * @var string
     */
    protected $table = 'users_experiences';

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return  $this->belongsTo(User::class, 'user_id');
    }
}
