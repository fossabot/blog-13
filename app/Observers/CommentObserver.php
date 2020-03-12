<?php

namespace App\Observers;

use App\Models\Comment;

class CommentObserver
{
    /**
     * Listen to the Comment creating event.
     * @param Comment $comment
     */
    public function creating(Comment $comment): void
    {
        $comment->posted_at = now();
    }
}
