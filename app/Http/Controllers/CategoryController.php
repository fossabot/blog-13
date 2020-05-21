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
use Illuminate\View\View;

/**
 * Class CategoryController
 * @package App\Http\Controllers
 */
class CategoryController extends Controller
{
    /**
     * @param Category $category
     * @return View
     */
    public function __invoke(Category $category): View
    {
        $query = Post::with(['tags', 'media', 'comments', 'likes'])->get();


        $posts =  $query->where('category_id', $category->id);

        $latest = $query->take(10);

        $layout = $category ? $category->layout : 'blog.categories.index';

        return view('blog.categories.single', [
            'category' => $category,
            'posts' => $posts,
            'latest' => $latest,
        ]);
    }
}
