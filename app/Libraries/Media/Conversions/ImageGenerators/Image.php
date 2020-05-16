<?php

namespace App\Libraries\Media\Conversions\ImageGenerators;

use App\Libraries\Media\Conversions\Conversion;
use Illuminate\Support\Collection;

/**
 * Class Image
 * @package App\Libraries\Media\Conversions\ImageGenerators
 */
class Image extends ImageGenerator
{
    /**
     * @param string $path
     * @param null|Conversion $conversion
     * @return string
     */
    public function convert(string $path, Conversion $conversion = null): string
    {
        return $path;
    }

    /**
     * @return bool
     */
    public function requirementsAreInstalled(): bool
    {
        return true;
    }

    /**
     * @return Collection
     */
    public function supportedExtensions(): Collection
    {
        return collect(['png', 'jpg', 'jpeg', 'gif']);
    }

    /**
     * @return Collection
     */
    public function supportedMimeTypes(): Collection
    {
        return collect(['image/jpeg', 'image/gif', 'image/png']);
    }
}
