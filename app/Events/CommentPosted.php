<?php

namespace App\Events;

use App\Http\Resources\Comment as CommentResource;
use App\Models\Post;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 * Class CommentPosted
 * @package App\Events
 */
class CommentPosted implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Comment details
     *
     * @var CommentResource
     */
    public CommentResource $comment;

    /**
     * Post details
     *
     * @var Post
     */
    private Post $post;

    /**
     * Create a new event instance.
     *
     * @param CommentResource $comment
     * @param Post $post
     */
    public function __construct(CommentResource $comment, Post $post)
    {
        $this->comment = $comment;
        $this->post = $post;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array|Channel
     */
    public function broadcastOn(): Channel
    {
        return new Channel('post.' . $this->post->id);
    }

    /**
     * The event's broadcast name.
     */
    public function broadcastAs(): string
    {
        return 'comment.posted';
    }
}
