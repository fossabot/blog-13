<?php


namespace App\Repositories;

use App\Models\Like;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * Trait Likeable
 * @package App\Repositories
 */
trait Likeable
{
    /**
     * The "booting" method of the trait.
     *
     * @return void
     */
    protected static function bootLikeable(): void
    {
        static::deleting(function ($resource) {
            $resource->likes->each->delete();
        });
    }

    /**
     * Get all of the resource's likes.
     *
     * @return MorphMany
     */
    public function likes(): MorphMany
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    /**
     * Create a like if it does not exist yet.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function like(): Model
    {
        if ($this->likes()->where('user_id', auth()->id())->doesntExist()) {
            return $this->likes()->create(['user_id' => auth()->id()]);
        }
    }

    /**
     * Check if the resource is liked by the current user
     *
     * @return bool
     */
    public function isLiked(): bool
    {
        if (!empty($this->likes)) {
            return $this->likes->where('user_id', auth()->id())->isNotEmpty();
        }
    }

    /**
     * Delete like for a resource.
     *
     * @return mixed
     */
    public function dislike()
    {
        return $this->likes()->where('user_id', auth()->id())->get()->each->delete();
    }
}
