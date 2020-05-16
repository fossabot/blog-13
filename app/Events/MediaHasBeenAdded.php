<?php

namespace App\Events;

use App\Models\Media;
use Illuminate\Queue\SerializesModels;

/**
 * Class MediaHasBeenAdded
 * @package App\Events
 */
class MediaHasBeenAdded
{
    use SerializesModels;

    /**
     * @var Media
     */
    public Media $media;

    /**
     * MediaHasBeenAdded constructor.
     * @param Media $media
     */
    public function __construct(Media $media)
    {
        $this->media = $media;
    }
}
