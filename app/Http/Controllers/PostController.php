<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class PostController
 * @package App\Http\Controllers
 */
final class PostController extends Controller
{
    /**
     * Show the application dashboard.
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request): View
    {
        return view('posts.index', [
            'posts' => Post::search($request->input('q'))
                ->with('user', 'likes')
                ->withCount('comments', 'likes')
                ->latest()
                ->paginate(20)
        ]);
    }

    /**
     * Display the specified resource.
     * @param Post $post
     * @return Factory|View
     */
    public function show(Post $post): View
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
