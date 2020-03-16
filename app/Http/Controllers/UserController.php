<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Request;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, User $user)
    {
        return view('users.show', [
            'user' => $user,
            'posts_count' => $user->posts()->count(),
            'comments_count' => $user->comments()->count(),
            'likes_count' => $user->likes()->count(),
            'posts' => $user->posts()->withCount('likes', 'comments')->latest()->limit(5)->get(),
            'comments' => $user->comments()->with('post.author')->latest()->limit(5)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = auth()->user();

        $this->authorize('update', $user);

        return view('users.edit', [
            'user' => $user,
            'roles' => Role::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param UsersRequest $request
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(UsersRequest $request): RedirectResponse
    {
        $user = auth()->user();

        $this->authorize('update', $user);

        $user->update($request->validated());

        return redirect()->route('users.edit')->withSuccess(__('users.updated'));
    }
}
