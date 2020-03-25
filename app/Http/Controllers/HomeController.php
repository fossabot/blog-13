<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
final class HomeController extends Controller
{
    /**
     * @var
     */
    protected $post;

    /**
     * HomeController constructor.
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post->with(['user', 'category'])
            ->where('is_draft',0)
            ->get();
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $slides = $this->post('slide', 10);
        $tutorials = $this->post('tutorial', 3);
        $blogs = $this->post('blog', 10);

        $blogs = Post::with('category')->whereType('blog')->paginate(10);

        $wiki = $this->post('wiki', 5);

        $content = $this->post->where('type', '=', 'sticky')
            ->random(1)
            ->first();


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
     * @return Builder[]|Collection|Post[]
     */
    private function post(string $value, int $limit)
    {
        return $this->post->where('type', $value)->take($limit);
    }
}
