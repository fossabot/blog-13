<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class Comment extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $user = \Auth::guard('api')->user();

        return [
            'id' => $this->id,
            'content' => $this->content,
            'posted_at' => $this->posted_at->toIso8601String(),
            'humanized_posted_at' => Carbon::parse($this->posted_at)->diffForHumans(),
            'author_id' => $this->author_id,
            'post_id' => $this->post_id,
            'author_name' => $this->author->name,
            'author_url' => route('users.show', $this->author),
            'can_delete' => $user ? $user->can('delete', $this->resource) : false
        ];
    }
}
