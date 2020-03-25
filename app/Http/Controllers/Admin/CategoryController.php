<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        Category::create($request->all());
        return redirect()
            ->route('admin.category.index')
            ->with('success', 'New Category successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function show($id): View
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit($id): View
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id):RedirectResponse
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect()
            ->route('admin.category.index')
            ->with('success', 'Category has been saved successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     *@throws Exception
     */
    public function destroy($id): RedirectResponse
    {
        $category  = Category::findOrFail($id);
        $category->delete();
        return redirect()
            ->route('admin.category.index')
            ->with('success', 'Category has been deleted successfully');
    }
}
