<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MediaLibraryRequest;
use App\Models\Media;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

/**
 * Class MediaLibraryController
 * @package App\Http\Controllers\Admin
 */
class MediaLibraryController extends Controller
{
    /**
     * Return the media library.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.media.index', [
            'media' => Media::all()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Media $medium
     * @return Media
     */
    public function show(Media $medium): Media
    {
        return $medium;
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        return view('admin.media.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param MediaLibraryRequest $request
     * @return RedirectResponse
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function store(MediaLibraryRequest $request): RedirectResponse
    {
        $image = $request->file('image');
        $name = $image->getClientOriginalName();

        if ($request->filled('name')) {
            $name = $request->input('name');
        }

        dd($request->all());

        Media::first()
            ->addMedia($image)
            ->usingName($name)
            ->toMediaCollection();
//
        return redirect()
            ->route('admin.media.index')
            ->withSuccess(__('media.created'));
    }

    /**
     * Remove the specified resource from storage.
     * @param Media $medium
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Media $medium): RedirectResponse
    {
        $medium->delete();

        return redirect()->route('admin.media.index')->withSuccess(__('media.deleted'));
    }
}
