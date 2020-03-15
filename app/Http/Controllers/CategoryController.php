<?php

namespace App\Http\Controllers;

use App\Models\Category;

/**
 * Class CategoryController
 * @package App\Http\Controllers
 */
class CategoryController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::with(['posts.user', 'posts.tags'])->get();
        return view('blogs.categories.index', compact('categories'));
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {
        $category = Category::whereSlug($slug)->firstOrFail();
//        dd($category);

        return view('blogs.categories.show', compact('category'));
    }
}
