<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
    public function index(Category $category): View
    {
        $categories = $category->with('image')->get();

        $cats = $categories->reject(function ($cat) {
            return $cat->id ===1;
        });

        return view('blog.categories.index', [
            'categories' => $cats
        ]);
    }

    /**
     * @param $slug
     * @return View
     */
    public function show($slug): View
    {
        $category = Category::with('posts.images')
            ->where('slug', $slug)
            ->firstOrFail();

        return view('blog.categories.show', [
            'category' => $category
        ]);
    }
}
