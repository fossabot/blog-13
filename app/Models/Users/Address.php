<?php

namespace App\Models\Users;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Users\Address
 *
 * @property int $id
 * @property int $user_id
 * @property string $label
 * @property string $address
 * @property string $postal
 * @property string $map
 * @property string $phone
 * @property string $fax
 * @property int $city_id
 * @property int $district_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Address query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Address whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Address whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Address whereDistrictId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Address whereFax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Address whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Address whereMap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Address wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Address wherePostal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Address whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Address whereUserId($value)
 * @mixin \Eloquent
 */
class Address extends Model
{
    /**
     * @var string
     */
    protected $table = 'users_addresses';

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return  $this->belongsTo(User::class, 'user_id');
    }
}
