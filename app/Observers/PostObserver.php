<?php

namespace App\Observers;

use App\Models\Post;
use Str;

/**
 * Class PostObserver
 * @package App\Observers
 */
class PostObserver
{
    /**
     * Listen to the Post saving event.
     * @param Post $post
     */
    public function saving(Post $post): void
    {
        $post->slug = Str::slug($post->title, '-');
    }
}
