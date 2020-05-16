<?php

namespace App\Libraries\Media\Conversions\ImageGenerators;

use App\Libraries\Media\Conversions\Conversion;
use Illuminate\Support\Collection;

/**
 * Class Webp
 * @package App\Libraries\Media\Conversions\ImageGenerators
 */
class Webp extends ImageGenerator
{
    /**
     * @param string $file
     * @param null|Conversion $conversion
     * @return string
     */
    public function convert(string $file, Conversion $conversion = null): string
    {
        $pathToImageFile = pathinfo($file, PATHINFO_DIRNAME).'/'.pathinfo($file, PATHINFO_FILENAME).'.png';

        $image = imagecreatefromwebp($file);

        imagepng($image, $pathToImageFile, 9);

        imagedestroy($image);

        return $pathToImageFile;
    }

    /**
     * @return bool
     */
    public function requirementsAreInstalled(): bool
    {
        if (! function_exists('imagecreatefromwebp')) {
            return false;
        }

        if (! function_exists('imagepng')) {
            return false;
        }

        if (! function_exists('imagedestroy')) {
            return false;
        }

        return true;
    }

    /**
     * @return Collection
     */
    public function supportedExtensions(): Collection
    {
        return collect(['webp']);
    }

    /**
     * @return Collection
     */
    public function supportedMimeTypes(): Collection
    {
        return collect(['image/webp']);
    }
}
