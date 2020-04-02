<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Http\Resources\Post as PostResource;
use App\Models\Post;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

/**
 * Class PostController
 * @package App\Http\Controllers\Api
 */
class PostController extends Controller
{
    /**
     * Return the posts.
     * @param Request $request
     * @return ResourceCollection
     */
    public function index(Request $request): ResourceCollection
    {
        return PostResource::collection(
            Post::search($request->input('q'))
                ->withCount('comments', 'likes')->latest()
                ->with('user')
                ->paginate($request->input('limit', 20))
        );
    }

    /**
     * Update the specified resource in storage.
     * @param PostRequest $request
     * @param Post $post
     * @throws AuthorizationException
     * @return PostResource
     */
    public function update(PostRequest $request, Post $post): PostResource
    {
        $this->authorize('update', $post);

        $post->update($request->only(['title', 'content', 'published_at', 'user_id', 'thumbnail_id']));

        return new PostResource($post);
    }

    /**
     * Store a newly created resource in storage.
     * @param PostRequest $request
     * @param Post $post
     * @return PostResource
     * @throws AuthorizationException
     */
    public function store(PostRequest $request, Post $post): PostResource
    {
        $this->authorize('store', Post::class);

        return new PostResource(
            $post->create($request->all())
        );
    }

    /**
     * Return the specified resource.
     * @param Post $post
     * @return PostResource
     */
    public function show(Post $post): PostResource
    {
        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     * @param Post $post
     * @throws AuthorizationException
     * @return Response
     */
    public function destroy(Post $post): Response
    {
        $this->authorize('delete', $post);

        $post->delete();

        return response()->noContent();
    }
}
