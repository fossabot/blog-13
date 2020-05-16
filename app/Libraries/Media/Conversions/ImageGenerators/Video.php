<?php

namespace App\Libraries\Media\Conversions\ImageGenerators;

use App\Libraries\Media\Conversions\Conversion;
use FFMpeg\Coordinate\TimeCode;
use FFMpeg\FFMpeg;
use Illuminate\Support\Collection;

/**
 * Class Video
 * @package App\Libraries\Media\Conversions\ImageGenerators
 */
class Video extends ImageGenerator
{
    /**
     * @param string $file
     * @param null|Conversion $conversion
     * @return string
     */
    public function convert(string $file, Conversion $conversion = null): string
    {
        $imageFile = pathinfo($file, PATHINFO_DIRNAME).'/'.pathinfo($file, PATHINFO_FILENAME).'.jpg';

        $ffmpeg = FFMpeg::create([
            'ffmpeg.binaries' => config('media-library.ffmpeg_path'),
            'ffprobe.binaries' => config('media-library.ffprobe_path'),
        ]);

        $video = $ffmpeg->open($file);
        $duration = $ffmpeg->getFFProbe()->format($file)->get('duration');

        $seconds = $conversion ? $conversion->getExtractVideoFrameAtSecond() : 0;
        $seconds = $duration < $seconds ? 0 : $seconds;

        $frame = $video->frame(TimeCode::fromSeconds($seconds));
        $frame->save($imageFile);

        return $imageFile;
    }

    /**
     * @return bool
     */
    public function requirementsAreInstalled(): bool
    {
        return class_exists('\\FFMpeg\\FFMpeg');
    }

    /**
     * @return Collection
     */
    public function supportedExtensions(): Collection
    {
        return collect(['webm', 'mov', 'mp4']);
    }

    /**
     * @return Collection
     */
    public function supportedMimeTypes(): Collection
    {
        return collect(['video/webm', 'video/mpeg', 'video/mp4', 'video/quicktime']);
    }
}
