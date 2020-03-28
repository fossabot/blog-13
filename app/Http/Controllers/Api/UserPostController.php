<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post as PostResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class UserPostController
 * @package App\Http\Controllers\Api
 */
class UserPostController extends Controller
{
    /**
     * Return the user's posts.
     * @param Request $request
     * @param User $user
     * @return ResourceCollection
     */
    public function index(Request $request, User $user): ResourceCollection
    {
        return PostResource::collection(
            $user->posts()->latest()->paginate($request->input('limit', 20))
        );
    }
}
