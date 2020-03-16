<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TagRequest;
use App\Models\Tag;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Class TagController
 * @package App\Http\Controllers\Admin
 */
class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param TagRequest $request
     * @return RedirectResponse
     */
    public function store(TagRequest $request): RedirectResponse
    {
        Tag::create($request->all());
        return redirect()
            ->back()
            ->with('success', 'Tag was saved successfully');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param TagRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(TagRequest $request, $id): RedirectResponse
    {
        $tag = Tag::findOrFail($id);
        $tag->update($request->all());

        return redirect()
            ->back()
            ->with('success', 'Tag was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy($id): RedirectResponse
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return redirect()
            ->back()
            ->with('success', 'Tag was deleted successfully');
    }
}
