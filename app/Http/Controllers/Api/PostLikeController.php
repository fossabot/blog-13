<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class PostLikeController
 * @package App\Http\Controllers\Api
 */
class PostLikeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Post $post
     * @return Model
     */
    public function store(Request $request, Post $post)
    {
        return $post->like();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return Response
     */
    public function destroy(Post $post)
    {
        return $post->dislike();
    }
}
