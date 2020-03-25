<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class Media
 * @property mixed id
 * @property mixed name
 * @package App\Http\Resources
 */
class Media extends JsonResource
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
            'name' => $this->name,
            'url' => url($this->getUrl()),
            'thumb_url' => url($this->getUrl('thumb')),
        ];
    }
}
