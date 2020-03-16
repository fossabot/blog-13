<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Comment as CommentResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCommentController extends Controller
{
    /**
     * Return the user's comments.
     * @param Request $request
     * @param User $user
     * @return ResourceCollection
     */
    public function index(Request $request, User $user): ResourceCollection
    {
        return CommentResource::collection(
            $user->comments()->latest()->paginate($request->input('limit', 20))
        );
    }
}