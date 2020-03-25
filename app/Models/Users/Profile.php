<?php

namespace App\Models\Users;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Users\Profile
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $alias
 * @property string $initial
 * @property int $gender
 * @property string $religion
 * @property string $marital
 * @property string $citizenship
 * @property string $number_personnel
 * @property string $number_citizen
 * @property string $number_taxpayer
 * @property string $number_passport
 * @property string $birthplace
 * @property string $birthday
 * @property int $weight
 * @property int $height
 * @property int $size_shoes
 * @property int $size_shirt
 * @property int $size_pants
 * @property string $blood
 * @property string $eyes
 * @property string $rhesus
 * @property string $website
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Profile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Profile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Profile query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Profile whereAlias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Profile whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Profile whereBirthplace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Profile whereBlood($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Profile whereCitizenship($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Profile whereEyes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Profile whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Profile whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Profile whereInitial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Profile whereMarital($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Profile whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Profile whereNumberCitizen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Profile whereNumberPassport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Profile whereNumberPersonnel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Profile whereNumberTaxpayer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Profile whereReligion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Profile whereRhesus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Profile whereSizePants($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Profile whereSizeShirt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Profile whereSizeShoes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Profile whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Profile whereWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Profile whereWeight($value)
 * @mixin \Eloquent
 */
class Profile extends Model
{
    /**
     * @var string
     */
    protected $table = 'users_profiles';

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return  $this->belongsTo(User::class, 'user_id');
    }
}
