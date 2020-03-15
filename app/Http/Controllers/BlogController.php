<?php

namespace App\Http\Controllers;

use App\Models\Post;

/**
 * Class BlogController
 * @package App\Http\Controllers
 */
class BlogController extends Controller
{
    /**
     * @var \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Post[]
     */
    protected $post;

    /**
     * BlogController constructor.
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post->with(['user', 'category', 'tags'])->get();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $blogs = $this->post->take(7);
        return view('blogs.index', compact('blogs'));
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {
        $blog = Post::whereSlug($slug)->first();
        dd($blog);
        $blog = $this->post->where('slug', $slug)->first();
        dd($blog);
//        $posts =  $this->post->where('category_id', $blog->category->id)
//            ->where('type', $blog->type)
//            ->take(3);



        $content = $this->post->where('type', '=', 'sticky')
            ->random(1)
            ->first();


        return view('blogs.show', compact('blog', 'content'));
    }
}
