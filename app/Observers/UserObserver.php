<?php

namespace App\Observers;

use App\Models\Token;
use App\Models\User;
use Str;

/**
 * Class UserObserver
 * @package App\Observers
 */
class UserObserver
{
    /**
     * Listen to the User creating event.
     * @param User $user
     */
    public function creating(User $user): void
    {
        $user->slug = Str::slug($user->name, '-');
        $user->registered_at = now();
        $user->api_token = Token::generate();
    }
}
