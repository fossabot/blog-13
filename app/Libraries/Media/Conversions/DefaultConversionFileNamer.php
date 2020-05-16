<?php

namespace App\Libraries\Media\Conversions;

use App\Models\Media;

class DefaultConversionFileNamer extends ConversionFileNamer
{
    public function getFileName(Conversion $conversion, Media $media): string
    {
        $fileName = pathinfo($media->file_name, PATHINFO_FILENAME);

        return "{$fileName}-{$conversion->getName()}";
    }
}
