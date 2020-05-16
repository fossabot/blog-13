<?php

namespace App\Libraries\Media\Conversions\Events;

use Illuminate\Queue\SerializesModels;
use App\Libraries\Media\Conversions\Conversion;
use App\Libraries\Media\MediaCollections\Models\Media;

/**
 * Class ConversionHasBeenCompleted
 * @package App\Libraries\Media\Conversions\Events
 */
class ConversionHasBeenCompleted
{
    use SerializesModels;

    /**
     * @var Media
     */
    public Media $media;

    /**
     * @var Conversion
     */
    public Conversion $conversion;

    /**
     * ConversionHasBeenCompleted constructor.
     * @param Media $media
     * @param Conversion $conversion
     */
    public function __construct(Media $media, Conversion $conversion)
    {
        $this->media = $media;

        $this->conversion = $conversion;
    }
}
