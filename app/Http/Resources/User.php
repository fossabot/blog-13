<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class User
 * @property mixed provider
 * @property integer provider_id
 * @property integer registered_at
 * @property mixed roles
 * @property mixed email
 * @property integer id
 * @property string name
 * @package App\Http\Resources
 */
class User extends JsonResource
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
            'email' => $this->email,
            'provider' => $this->provider,
            'provider_id' => $this->provider_id,
            'registered_at' => $this->registered_at->toIso8601String(),
            'comments_count' => $this->comments_count ?? $this->comments()->count(),
            'posts_count' => $this->posts_count ?? $this->posts()->count(),
            'roles' => Role::collection($this->roles),
        ];
    }
}
