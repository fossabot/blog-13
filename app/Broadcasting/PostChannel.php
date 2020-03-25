<?php

namespace App\Broadcasting;

use App\Models\Post;
use App\Models\User;

class PostChannel
{
    /**
     * Create a new channel instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Authenticate the user's access to the channel.
     *
     * @param User $user
     * @return array|bool
     */
    public function join(User $user, Post $post)
    {
        return  true;
    }
}
