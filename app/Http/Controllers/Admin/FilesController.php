<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FileUploadRequest;
use App\Models\Image;
use Illuminate\Http\Request;

class FilesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Handle an upload & store model instance
     *
     * @param FileUploadRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( FileUploadRequest $request ) {
        $uploadedFile = $request->file('file');

        if (!$uploadedFile->isValid()) {
            abort( 422 );
        }

        $storePath = $uploadedFile->store('public/media');

        $file = new Image;

        $file->name = $uploadedFile->getClientOriginalName();
        $file->file = $storePath;
        $file->mime = $uploadedFile->getMimeType();
        $file->size = $uploadedFile->getSize();

        \Auth::user()->image()->save($file);

        return response()->json([
            'status' => true,
            'data' => $file
        ]);
    }
}
