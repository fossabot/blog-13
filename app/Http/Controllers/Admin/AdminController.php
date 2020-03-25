<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

final class AdminController extends Controller
{
    /**
     * Show the application admin dashboard.
     */
    public function __invoke()
    {
        return view('admin.home');
//        return view('admin.dashboard.index', [
//            'comments' =>  Comment::lastWeek()->get(),
//            'posts' => Post::lastWeek()->get(),
//            'users' => User::lastWeek()->get(),
//        ]);
    }
}
