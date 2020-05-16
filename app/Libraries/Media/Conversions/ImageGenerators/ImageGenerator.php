<?php

namespace App\Libraries\Media\Conversions\ImageGenerators;

use App\Libraries\Media\Conversions\Conversion;
use App\Libraries\Media\MediaCollections\Models\Media;
use Illuminate\Support\Collection;

/**
 * Class ImageGenerator
 * @package App\Libraries\Media\Conversions\ImageGenerators
 */
abstract class ImageGenerator
{
    /*
     * This function should return a path to an image representation of the given file.
     */
    /**
     * @param string $file
     * @param null|Conversion $conversion
     * @return string
     */
    abstract public function convert(string $file, Conversion $conversion = null): string;

    /**
     * @param Media $media
     * @return bool
     */
    public function canConvert(Media $media): bool
    {
        if (! $this->requirementsAreInstalled()) {
            return false;
        }

        $validExtension = $this->canHandleExtension(strtolower($media->extension));

        $validMimeType = $this->canHandleMime(strtolower($media->mime_type));

        if ($this->shouldMatchBothExtensionsAndMimeTypes()) {
            return $validExtension && $validMimeType;
        }

        return $validExtension || $validMimeType;
    }

    /**
     * @return bool
     */
    public function shouldMatchBothExtensionsAndMimeTypes(): bool
    {
        return false;
    }

    /**
     * @param string $mime
     * @return bool
     */
    public function canHandleMime(string $mime = ''): bool
    {
        return $this->supportedMimeTypes()->contains($mime);
    }

    /**
     * @param string $extension
     * @return bool
     */
    public function canHandleExtension(string $extension = ''): bool
    {
        return $this->supportedExtensions()->contains($extension);
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return strtolower(class_basename(static::class));
    }

    /**
     * @return bool
     */
    abstract public function requirementsAreInstalled(): bool;

    /**
     * @return Collection
     */
    abstract public function supportedExtensions(): Collection;

    /**
     * @return Collection
     */
    abstract public function supportedMimeTypes(): Collection;
}
