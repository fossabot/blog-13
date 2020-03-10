<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            'slug' => $this->slug,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'content' => $this->content_html,
            'author' => $this->append('author')
        ];
    }
}
