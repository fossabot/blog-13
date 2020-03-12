<?php

namespace App\Observers;

use App\Models\Media;

class MediaObserver
{
    /**
     * Listen to the Media creating event.
     * @param Media $medium
     */
    public function creating(Media $medium): void
    {
        $medium->posted_at = now();
    }
}
