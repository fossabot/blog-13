<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class Tag extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'tag' => $this->tag,
            'meta_description' => $this->meta_description,
            'description' => $this->description,
            'created_at' => $this->created_at->toIso8601String(),
            'time_humanize' => Carbon::parse($this->created_at)->diffForHumans(),
        ];
    }
}
