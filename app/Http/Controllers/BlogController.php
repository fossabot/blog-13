<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 */

namespace App\Http\Controllers;

use App\Libraries\Rss\RssFeed;
use App\Libraries\SiteMap\SiteMap;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

/**
 * Class BlogController
 * @package App\Http\Controllers
 */
class BlogController extends Controller
{
    /**
     * Show all blog
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $query = Post::search($request->input('query'))
            ->where('published_at', '<=', now())
            ->where('is_draft', 0)
            ->orderBy('published_at', 'desc')
            ->with(['cover', 'category', 'user']);

        $blogs = $query
            ->where('type', 'blog')
            ->paginate(10);
        $latest = $query->latest()->get();
        $posts = $query->get();

        $getPost = $query->inRandomOrder()->first();

        $featured = $query->where('is_sticky', true)->get();

        $layout = 'blog.index';


        return view($layout, [
            'blogs' => $blogs,
            'posts' => $posts,
            'featured' => $featured,
            'latest'=> $latest,
            'getPost' => $getPost,
            'categories' => Category::with('posts.user')->get()
        ]);
    }

    /**
     * Show blog by slug
     *
     * @param $slug
     * @return View
     */
    public function show($slug): View
    {
        $query = Post::with(['tags', 'cover', 'category', 'comments.user'])->get();
        $blog = $query->where('slug', $slug)->first();
        $posts =  $query->where('category_id', $blog->category->id)
            ->except($blog->id);

        return view('blog.show', [
            'blog' => $blog,
            'posts' => $posts,
            'categories' => Category::with('posts.user')->get()
        ]);
    }

    /**
     * @param RssFeed $feed
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function rss(RssFeed $feed): Response
    {
        $rss = $feed->getRSS();

        return response($rss)
            ->header('Content-type', 'application/rss+xml');
    }

    /**
     * @param SiteMap $siteMap
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function siteMap(SiteMap $siteMap): Response
    {
        $map = $siteMap->getSiteMap();

        return response($map)
            ->header('Content-type', 'text/xml');
    }
}
