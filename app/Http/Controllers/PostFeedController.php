<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Response;

class PostFeedController extends Controller
{
    /**
     * Show the rss feed of posts.
     */
    public function index()
    {
        $posts = Cache::remember('feed-posts', now()->addHour(), fn () => Post::latest()->limit(20)->get());

        return response()->view('posts_feed.index', [
            'posts' => $posts
        ], 200)->header('Content-Type', 'text/xml');
    }
}
