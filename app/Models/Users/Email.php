<?php

namespace App\Models\Users;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Users\Email
 *
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Email newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Email newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Email query()
 * @mixin \Eloquent
 */
class Email extends Model
{
    /**
     * @var string
     */
    protected $table = 'users_email';

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return  $this->belongsTo(User::class, 'user_id');
    }
}
