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
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Instagram\Exception\InstagramCacheException
     * @throws \Instagram\Exception\InstagramException
     */
    public function __invoke(Category $category): View
    {
        $query = Post::with(['tags', 'media', 'category', 'comments', 'likes'])->get();

        $posts =  $query->where('category_id', $category->id)
            ->take(10);

        $latest = $query->take(10);

        $layout = $category->layout ? $category->layout : 'blog.categories.index';

        return view($layout, [
            'category' => $category,
            'posts' => $posts,
            'latest' => $latest,
            'instagram' => $this->instagram()
        ]);
    }
}
