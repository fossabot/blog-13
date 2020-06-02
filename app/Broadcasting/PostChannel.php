<?php

namespace App\Broadcasting;

use App\Models\Post;
use App\Models\User;

/**
 * Class PostChannel
 * @package App\Broadcasting
 */
class PostChannel
{
    /**
     * Authenticate the user's access to the channel.
     *
     * @param User $user
     * @param Post $post
     * @return array|bool
     */
    public function join(User $user, Post $post)
    {
        return  true;
    }
}
