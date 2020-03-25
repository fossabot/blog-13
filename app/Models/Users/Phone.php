<?php

namespace App\Models\Users;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Users\Phone
 *
 * @property int $id
 * @property int $user_id
 * @property string $address
 * @property int $primary
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Phone newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Phone newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Phone query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Phone whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Phone whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Phone whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Phone wherePrimary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Phone whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Phone whereUserId($value)
 * @mixin \Eloquent
 */
class Phone extends Model
{
    /**
     * @var string
     */
    protected $table = 'users_phones';

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return  $this->belongsTo(User::class, 'user_id');
    }
}
