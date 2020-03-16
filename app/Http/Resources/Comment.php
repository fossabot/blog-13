<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class Comment
 * @package App\Http\Resources
 */
class Comment extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        $user = \Auth::guard('api')->user();

        return [
            'id' => $this->id,
            'content' => $this->content,
            'published_at' => $this->published_at->toIso8601String(),
            'humanized_published_at' => Carbon::parse($this->published_at)->diffForHumans(),
            'user_id' => $this->user_id,
            'post_id' => $this->post_id,
            'author_name' => $this->user->name,
            'author_url' => route('users.show', $this->author),
            'can_delete' => $user ? $user->can('delete', $this->resource) : false
        ];
    }
}
