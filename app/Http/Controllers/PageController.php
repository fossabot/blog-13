<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Static page content
     *
     * @param Post $post
     * @return Factory|View
     */
    public function __invoke(Post $post): View
    {
        return view('blog.page', [
            'post' => $post
        ]);
    }
}
