<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 */

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
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
            ->with(['image', 'category', 'user']);

        $blogs = $query
            ->where('type', 'blog')
            ->paginate(10);
        $latest = $query->latest()->get();

        $featured = $query->where('is_sticky', true)->get();

        return view('blogxer.index', [
            'blogs' => $blogs,
            'featured' => $featured,
            'latest'=> $latest,
            'categories' => Category::with('posts')->get()
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
        $query = Post::with(['tags', 'image', 'category'])->get();
        $blog = $query->where('slug', $slug)->first();
//        $blog->likes()->count();
        $posts =  $query->where('category_id', $blog->category->id)
            ->except($blog->id);

        return view('blogxer.show', [
            'blog' => $blog,
            'posts' => $posts,
            'categories' => Category::with('posts')->get()
        ]);
    }
}
