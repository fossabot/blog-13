<?php

namespace App\Http\Resources;

use Carbon\Carbon;
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
 * @property mixed subtitle
 * @property mixed user
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
            'subtitle' => $this->subtitle,
            'published_at' => $this->published_at,
//            'time_humanize' => Carbon::parse($this->published_at)->diffForHumans(),
            'author' => $this->user->name,
            'avatar' => $this->user->avatar,
            'comments_count' => $this->comments_count ?? $this->comments()->count(),
//            'thumbnail_url' => $this->when($this->hasThumbnail(), url(optional($this->thumbnail)->getUrl())),
//            'thumb_thumbnail_url' => $this->when($this->hasThumbnail(), url(optional($this->thumbnail)->getUrl('thumb')))
        ];
    }
}
