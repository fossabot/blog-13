<?php

namespace App\Libraries\Media\Support;

use Illuminate\Support\Str;
use Spatie\TemporaryDirectory\TemporaryDirectory as BaseTemporaryDirectory;

/**
 * Class TemporaryDirectory
 * @package App\Libraries\Media\Support
 */
class TemporaryDirectory
{
    /**
     * @return BaseTemporaryDirectory
     */
    public static function create(): BaseTemporaryDirectory
    {
        return new BaseTemporaryDirectory(static::getTemporaryDirectoryPath());
    }

    /**
     * @return string
     */
    protected static function getTemporaryDirectoryPath(): string
    {
        $path = config('media-library.temporary_directory_path') ?? storage_path('media-library/temp');

        return $path.DIRECTORY_SEPARATOR.Str::random(32);
    }
}
