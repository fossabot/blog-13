<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class PostController
 * @package App\Http\Controllers\Admin
 */
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        return view('admin.posts.index', [
            'posts' => Post::withCount('comments', 'likes')
                ->with('user')
                ->latest()
                ->get()
//                ->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        return view('admin.posts.create', [
            'users' => User::authors()->pluck('name', 'id'),
            'categories' => Category::pluck('title', 'id'),
            'media' => Media::pluck('name', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest $request
     * @param Post $post
     * @throws Exception
     * @return RedirectResponse
     */
    public function store(PostRequest $request, Post $post): RedirectResponse
    {
        $post->create($request->postFillData());

        return redirect()->route('admin.posts.edit', $post)->withSuccess(__('posts.created'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return View
     */
    public function edit(Post $post): View
    {
        return view('admin.posts.edit', [
            'post' => $post,
            'users' => User::authors()->pluck('name', 'id'),
            'categories' => Category::pluck('title', 'id'),
            'media' => Media::pluck('name', 'id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Post $post
     * @throws Exception
     * @return RedirectResponse
     */
    public function update(Request $request, Post $post): RedirectResponse
    {
        $post->update($request->postFillData());

        return redirect()
            ->route('admin.posts.edit', $post)
            ->withSuccess(__('posts.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @throws Exception
     * @return RedirectResponse
     */
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()
            ->route('admin.posts.index')
            ->withSuccess(__('posts.deleted'));
    }
}
