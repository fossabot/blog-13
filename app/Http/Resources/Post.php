<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class Post
 * @property mixed user_id
 * @property mixed published_at
 * @property mixed content
 * @property mixed slug
 * @property mixed title
 * @property mixed id
 * @package App\Http\Resources
 */
class Post extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'published_at' => $this->published_at,
            'user_id' => $this->user_id,
            'comments_count' => $this->comments_count ?? $this->comments()->count(),
//            'thumbnail_url' => $this->when($this->hasThumbnail(), url(optional($this->thumbnail)->getUrl())),
//            'thumb_thumbnail_url' => $this->when($this->hasThumbnail(), url(optional($this->thumbnail)->getUrl('thumb')))
        ];
    }
}
