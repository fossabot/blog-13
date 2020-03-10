<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Index resource
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() {
//        return  new PostResource(Post::get());
        $posts = Post::with('user')->get();

        $posts->each(function ($post) {
            $post->append('author');
        });

        return response()->json([
            'data' => $posts
        ]);
    }

    /**
     * Get single resource
     *
     * @param Post $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function show( Post $post ) {
//        $post->append('avatar');
//        $post->append('avatar_filename');
//        $post->append('created_mm_dd_yyyy');
        dd($post);

        return response()->json([
            'data' => $post
        ]);
    }

    /**
     * Update single resource
     *
     * @param PostRequest $request
     * @param Post $post
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function update( PostRequest $request, Post $post ) {
        $post->fill($request->postFillData());
        $post->save();

//        $post->append('avatar');

        return response()->json([
            'status' => true,
            'data' => $post
        ]);
    }

    /**
     * Store new resource
     *
     * @param PostRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function store( PostRequest $request ) {
        $post = new Post();
        $post->fill($request->postFillData());
        $post->save();

        return response()->json([
            'status' => true,
            'created' => true,
            'data' => [
                'id' => $post->id
            ]
        ]);
    }

    /**
     * Destroy single resource
     *
     * @param Post $post
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy( Post $post ) {
        $post->delete();

        return response()->json([
            'status' => true
        ]);
    }

    /**
     * Destroy resources by ids
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroyMass( Request $request ) {
        $request->validate([
            'ids' => 'required|array'
        ]);

        Post::destroy($request->ids);

        return response()->json([
            'status' => true
        ]);
    }
}
