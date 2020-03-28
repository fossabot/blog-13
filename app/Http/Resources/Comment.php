<?php

namespace App\Http\Resources;

use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class Comment
 * @property int user_id
 * @property int post_id
 * @property mixed user
 * @property boolean approved
 * @property mixed published_at
 * @property mixed content
 * @property int id
 * @package App\Http\Resources
 */
class Comment extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        $user = Auth::guard('api')->user();

        return [
            'id' => $this->id,
            'content' => $this->content,
            'published_at' => $this->published_at->toIso8601String(),
            'time_humanize' => Carbon::parse($this->published_at)->diffForHumans(),
            'author' => $this->user->name,
            'avatar' => $this->user->avatar,
            'post' => ! is_null($this->commentable) ? $this->commentable->title : null,
            'author_name' => $this->user->name,
            'author_url' => route('users.show', $this->user),
            'approved' => $this->approved,
            'can_delete' => $user ? $user->can('delete', $this->resource) : false
        ];
    }
}
