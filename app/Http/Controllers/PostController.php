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
 * Class PostController
 * @package App\Http\Controllers
 */
final class PostController extends Controller
{
    /**
     * @var Post
     */
    protected ?Post $post;

    /**
     * PostController constructor.
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Show all blog
     *
     * @param Request $request
     * @return View
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Instagram\Exception\InstagramCacheException
     * @throws \Instagram\Exception\InstagramException
     */
    public function index(Request $request): View
    {
        $query = Post::where('published_at', '<=', now())
            ->where('is_draft', 0)
            ->orderBy('published_at', 'desc')
            ->with(['category', 'user', 'likes', 'media'])->get();

        if ($request->has('query')  && $request->input('query')  != '') {
            $query = $this->post->search($request->input('query'));
        }

        $blogs = $query
            ->where('type', 'blog')
            ->all();

        $latest = $query->take(10);
        $posts = $query;


        $featured = $query->where('is_sticky', true);

        $getPost = $query->random();


        $layout = 'blog.index';


        return view($layout, [
            'blogs' => $blogs,
            'posts' => $posts,
            'featured' => $featured,
            'latest'=> $latest,
            'getPost' => $getPost,
            'categories' => Category::with('posts')->get(),
            'instagram' => $this->instagram()
        ]);
    }

    /**
     * Show blog by slug
     *
     * @param string $slug
     * @return View
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Instagram\Exception\InstagramCacheException
     * @throws \Instagram\Exception\InstagramException
     */
    public function show(string $slug): View
    {
        $query = $this->post->with(['media', 'tags', 'category', 'comments.user.media'])->get();
        $blog = $query->where('slug', $slug)->first();
        $blog->getMedia('sliders');

//        $mediaItems = $blog->getMedia('posts');
//        $publicUrl = $mediaItems[0]->getUrl();
//        $publicFullUrl = $mediaItems[0]->getFullUrl(); //url including domain
//        $fullPathOnDisk = $mediaItems[0]->getPath();
//        $temporaryS3Url = $mediaItems[0]->getTemporaryUrl(Carbon::now()->addMinutes(5));
//        $media = $blog->getFirstMedia();
//        $url = $blog->getFirstMediaUrl();
//        dd($media('large'));

        $posts =  $query->where('category_id', $blog->category->id)
            ->except($blog->id);

        $layout = 'blog.show';

        return view($layout, [
            'blog' => $blog,
            'posts' => $posts,
            'categories' => Category::with('posts')->get(),
            'instagram' => $this->instagram()
        ]);
    }

    /**
     * @param Post $page
     * @return View
     */
    public function page(Post $page): View
    {
        return view('blog.page', [
            'post' => $page
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
