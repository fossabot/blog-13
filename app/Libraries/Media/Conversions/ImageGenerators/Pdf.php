<?php

namespace App\Libraries\Media\Conversions\ImageGenerators;

use App\Libraries\Media\Conversions\Conversion;
use Illuminate\Support\Collection;

/**
 * Class Pdf
 * @package App\Libraries\Media\Conversions\ImageGenerators
 */
class Pdf extends ImageGenerator
{
    /**
     * @param string $file
     * @param null|Conversion $conversion
     * @return string
     */
    public function convert(string $file, Conversion $conversion = null): string
    {
        $imageFile = pathinfo($file, PATHINFO_DIRNAME).'/'.pathinfo($file, PATHINFO_FILENAME).'.jpg';

        $pageNumber = $conversion ? $conversion->getPdfPageNumber() : 1;

        (new \Spatie\PdfToImage\Pdf($file))->setPage($pageNumber)->saveImage($imageFile);

        return $imageFile;
    }

    /**
     * @return bool
     */
    public function requirementsAreInstalled(): bool
    {
        if (! class_exists('Imagick')) {
            return false;
        }

        if (! class_exists('\\Spatie\\PdfToImage\\Pdf')) {
            return false;
        }

        return true;
    }

    /**
     * @return Collection
     */
    public function supportedExtensions(): Collection
    {
        return collect('pdf');
    }

    /**
     * @return Collection
     */
    public function supportedMimeTypes(): Collection
    {
        return collect(['application/pdf']);
    }
}
