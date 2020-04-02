<?php

namespace App\Observers;

use App\Models\Comment;

/**
 * Class CommentObserver
 * @package App\Observers
 */
class CommentObserver
{
    /**
     * Listen to the Comment creating event.
     * @param Comment $comment
     */
    public function creating(Comment $comment): void
    {
        $comment->published_at = now();
    }
}
