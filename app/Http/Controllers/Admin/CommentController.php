<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CommentsRequest;
use App\Models\Comment;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Class CommentController
 * @package App\Http\Controllers\Admin
 */
class CommentController extends Controller
{
    /**
     * Show the application comments index.
     */
    public function index(): View
    {
        return view('admin.comments.index', [
            'comments' => Comment::with('post', 'author')->latest()->paginate(50)
        ]);
    }

    /**
     * Display the specified resource edit form.
     * @param Comment $comment
     * @return View
     */
    public function edit(Comment $comment): View
    {
        return view('admin.comments.edit', [
            'comment' => $comment,
            'users' => User::pluck('name', 'id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param CommentsRequest $request
     * @param Comment $comment
     * @return RedirectResponse
     */
    public function update(CommentsRequest $request, Comment $comment): RedirectResponse
    {
        $comment->update($request->validated());

        return redirect()->route('admin.comments.edit', $comment)->withSuccess(__('comments.updated'));
    }

    /**
     * Remove the specified resource from storage.
     * @param Comment $comment
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Comment $comment): RedirectResponse
    {
        $comment->delete();

        return redirect()->route('admin.comments.index')->withSuccess(__('comments.deleted'));
    }
}
