<?php

namespace App\Libraries\Media\Conversions\ImageGenerators;

use App\Libraries\Media\Conversions\Conversion;
use Illuminate\Support\Collection;
use Imagick;
use ImagickPixel;

/**
 * Class Svg
 * @package App\Libraries\Media\Conversions\ImageGenerators
 */
class Svg extends ImageGenerator
{
    /**
     * @param string $file
     * @param null|Conversion $conversion
     * @throws \ImagickException
     * @return string
     */
    public function convert(string $file, Conversion $conversion = null): string
    {
        $imageFile = pathinfo($file, PATHINFO_DIRNAME).'/'.pathinfo($file, PATHINFO_FILENAME).'.jpg';

        $image = new Imagick();
        $image->readImage($file);
        $image->setBackgroundColor(new ImagickPixel('none'));
        $image->setImageFormat('jpg');

        file_put_contents($imageFile, $image);

        return $imageFile;
    }

    /**
     * @return bool
     */
    public function requirementsAreInstalled(): bool
    {
        return class_exists('Imagick');
    }

    /**
     * @return Collection
     */
    public function supportedExtensions(): Collection
    {
        return collect('svg');
    }

    /**
     * @return Collection
     */
    public function supportedMimeTypes(): Collection
    {
        return collect('image/svg+xml');
    }
}
