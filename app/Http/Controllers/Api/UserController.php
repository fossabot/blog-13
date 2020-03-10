<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PasswordUpdateRequest;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Get current user's profile
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show( Request $request ) {
        $user = $request->user();

//        $user->load('file');
//        $user->append('avatar');

        return response()->json([
            'data' => $request->user()
        ]);
    }

    /**
     * Update current user's profile
     *
     * @param ProfileUpdateRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( ProfileUpdateRequest $request ) {
        $user = $request->user();

        $user->fill($request->only(['name','email']));

        if (filled($request->file_id)) {
            $user->file_id = $request->file_id;
        }

        $user->save();

        $user->load('file');
        $user->append('avatar');

        return response()->json([
            'data' => $user
        ]);
    }

    /**
     * Update current user's password
     *
     * @param PasswordUpdateRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updatePassword( PasswordUpdateRequest $request ) {
        $user = $request->user();
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json([
            'status' => true
        ]);
    }
}
