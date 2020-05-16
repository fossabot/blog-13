<?php

namespace App\Libraries\Media\Conversions\Events;

use Illuminate\Queue\SerializesModels;
use App\Libraries\Media\Conversions\Conversion;
use App\Libraries\Media\MediaCollections\Models\Media;

/**
 * Class ConversionWillStart
 * @package App\Libraries\Media\Conversions\Events
 */
class ConversionWillStart
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
     * @var string
     */
    public string $copiedOriginalFile;

    /**
     * ConversionWillStart constructor.
     * @param Media $media
     * @param Conversion $conversion
     * @param string $copiedOriginalFile
     */
    public function __construct(Media $media, Conversion $conversion, string $copiedOriginalFile)
    {
        $this->media = $media;

        $this->conversion = $conversion;

        $this->copiedOriginalFile = $copiedOriginalFile;
    }
}
