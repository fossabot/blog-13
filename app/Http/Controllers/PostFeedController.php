<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 */

namespace App\Http\Controllers;

use App\Models\Post;
use Cache;
use Illuminate\Http\Response;

final class PostFeedController extends Controller
{
    /**
     * Show the rss feed of posts.
     *
     * @return Response
     */
    public function index(): Response
    {
        $posts = Cache::remember('feed-posts', now()->addHour(), fn () => Post::latest()->limit(20)->get());

        return response()->view('posts_feed.index', [
            'posts' => $posts
        ], 200)->header('Content-Type', 'text/xml');
    }
}
