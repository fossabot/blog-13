<?php

namespace App\Http\Controllers;

use App\Libraries\Manifest\ManifestService;

/**
 * Class ManifestController
 * @package App\Http\Controllers
 */
class ManifestController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifestJson()
    {
        $output = (new ManifestService)->generate();
        return response()->json($output);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function offline()
    {
        return view('vendor.pwa.offline');
    }
}
