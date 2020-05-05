<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 */

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
