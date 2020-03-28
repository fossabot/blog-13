<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Comment as CommentResource;
use App\Models\Comment;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

/**
 * Class CommentController
 * @package App\Http\Controllers\Api
 */
class CommentController extends Controller
{
    /**
     * Return the comments.
     * @param Request $request
     * @return ResourceCollection
     */
    public function index(Request $request): ResourceCollection
    {
        return CommentResource::collection(
            Comment::latest()
                ->paginate($request->input('limit', 20))
        );
    }

    /**
     * Return the specified resource.
     * @param Comment $comment
     * @return CommentResource
     */
    public function show(Comment $comment): CommentResource
    {
        return new CommentResource($comment);
    }

    /**
     * Remove the specified resource from storage.
     * @param Comment $comment
     * @return Response
     * @throws \Exception
     * @throws AuthorizationException
     */
    public function destroy(Comment $comment): Response
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        return response()->noContent();
    }
}
