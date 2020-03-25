<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

final class UserController extends Controller
{
    /**
     * Display the specified resource.
     * @param User $user
     * @return Factory|View
     */
    public function show(User $user): View
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
     *
     * @return View
     * @throws AuthorizationException
     */
    public function edit(): View
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
     * @throws AuthorizationException
     */
    public function update(UsersRequest $request): RedirectResponse
    {
        $user = auth()->user();

        $this->authorize('update', $user);

        $user->update($request->validated());

        return redirect()
            ->route('users.edit')
            ->withSuccess(__('users.updated'));
    }
}
