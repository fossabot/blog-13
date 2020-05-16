<?php

namespace App\Libraries\Media\Conversions\ImageGenerators;

use App\Libraries\Media\MediaCollections\Models\Media;
use Illuminate\Support\Collection;

/**
 * Class ImageGeneratorFactory
 * @package App\Libraries\Media\Conversions\ImageGenerators
 */
class ImageGeneratorFactory
{
    /**
     * @return Collection
     */
    public static function getImageGenerators(): Collection
    {
        return collect(config('media-library.image_generators'))
            ->map(fn (string $imageGeneratorClassName) => app($imageGeneratorClassName));
    }

    /**
     * @param null|string $extension
     * @return null|ImageGenerator
     */
    public static function forExtension(?string $extension): ?ImageGenerator
    {
        return static::getImageGenerators()
            ->first(fn (ImageGenerator $imageGenerator) => $imageGenerator->canHandleExtension(strtolower($extension)));
    }

    /**
     * @param null|string $mimeType
     * @return null|ImageGenerator
     */
    public static function forMimeType(?string $mimeType): ?ImageGenerator
    {
        return static::getImageGenerators()
            ->first(fn (ImageGenerator $imageGenerator) => $imageGenerator->canHandleMime($mimeType));
    }

    /**
     * @param Media $media
     * @return null|ImageGenerator
     */
    public static function forMedia(Media $media): ?ImageGenerator
    {
        return static::getImageGenerators()
            ->first(fn (ImageGenerator $imageGenerator) => $imageGenerator->canConvert($media));
    }
}
