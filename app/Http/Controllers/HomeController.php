<?php

namespace App\Http\Controllers;

use App\Models\Post;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post->with(['user', 'category'])
            ->whereIsDraft(0)
            ->get();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $slides = $this->post('slide', 10);
        $tutorials = $this->post('tutorial', 3);
        $blogs = $this->post('blog', 10);

        $blogs = Post::with('category')->whereType('blog')->paginate(10);

        $wiki = $this->post('wiki', 5);

        $content = $this->post->where('type', '=', 'sticky')
            ->random(1)
            ->first();

//        dd($slides);

        return view('frontpage', [
            'blogs' => $blogs,
            'tutorials' => $tutorials,
            'content' => $content,
            'slides' => $slides,
            'wiki' => $wiki
        ]);
    }

    /**
     * @param string $value
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Post[]
     */
    private function post(string $value, int $limit)
    {
        return $this->post->where('type', $value)->take($limit);
    }
}
