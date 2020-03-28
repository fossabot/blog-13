<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\Factory;
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
     * @return Factory|View
     */
    public function index(Request $request): View
    {

        $query = Post::search($request->input('query'))
            ->where('published_at', '<=', now())
            ->where('is_draft', 0)
            ->orderBy('published_at', 'desc')
            ->with(['images', 'category']);

        $blogs = $query
            ->where('type', 'blog')
            ->paginate(9);

        $featured = $query->where('is_sticky', true)->get();

        return view('blog.index',[
            'blogs' => $blogs,
            'featured' => $featured
        ]);
    }

    /**
     * Show blog by slug
     *
     * @param $slug
     * @return Factory|View
     */
    public function show($slug): View
    {
        $query = Post::with(['images', 'tags', 'category', 'user'])->get();
        $blog = $query->where('slug', $slug)->first();
        $posts =  $query->where('category_id', $blog->category->id)
            ->except($blog->id);


        return view('blog.show', [
            'blog' => $blog,
            'posts' => $posts
        ]);
    }


}
