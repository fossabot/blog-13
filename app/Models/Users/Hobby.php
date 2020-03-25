<?php

namespace App\Models\Users;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Users\Hobby
 *
 * @property int $id
 * @property int $user_id
 * @property string $hobby
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Hobby newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Hobby newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Hobby query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Hobby whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Hobby whereHobby($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Hobby whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Hobby whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Hobby whereUserId($value)
 * @mixin \Eloquent
 */
class Hobby extends Model
{
    /**
     * @var string
     */
    protected $table = 'users_hobbies';

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return  $this->belongsTo(User::class, 'user_id');
    }
}
