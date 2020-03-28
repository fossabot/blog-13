<?php

namespace App\Http\Controllers\Api;

use App\Events\CommentPosted;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CommentsRequest;
use App\Http\Resources\Comment as CommentResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Auth;

/**
 * Class PostCommentController
 * @package App\Http\Controllers\Api
 */
class PostCommentController extends Controller
{
    /**
     * Return the post's comments.
     * @param Request $request
     * @param Post $post
     * @return ResourceCollection
     */
    public function index(Request $request, Post $post): ResourceCollection
    {
        return CommentResource::collection(
            $post->comments()->with('user')
                ->whereApproved(true)
                ->latest()
                ->paginate($request->input('limit', 20))
        );
    }

    /**
     * Store a newly created resource in storage.
     * @param CommentsRequest $request
     * @param Post $post
     * @return CommentResource
     */
    public function store(Request $request, Post $post): CommentResource
    {
        $comment = new CommentResource(
            Auth::user()->comments()->create($request->all())
        );

        broadcast(new CommentPosted($comment, $post))->toOthers();

        return $comment;
    }
}
