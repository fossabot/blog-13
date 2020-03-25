<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

/**
 * Class CategoryController
 * @package App\Http\Controllers
 */
class CategoryController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index(): View
    {
        $categories = Category::with(['posts.user', 'posts.tags'])->get();
        return view('blogs.categories.index', compact('categories'));
    }

    /**
     * @param $slug
     * @return Factory|View
     */
    public function show($slug): View
    {
        $category = Category::whereSlug($slug)->firstOrFail();
//        dd($category);

        return view('blogs.categories.show', compact('category'));
    }
}
