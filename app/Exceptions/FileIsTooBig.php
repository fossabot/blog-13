<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @modified    5/16/20, 12:52 AM
 *  @name          FileIsTooBig.php
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 *
 */

namespace App\Exceptions;

use App\Libraries\Media\Support\File;

/**
 * Class FileIsTooBig
 * @package App\Exceptions
 */
class FileIsTooBig extends FileCannotBeAdded
{
    /**
     * @param string $path
     * @param null|int $size
     * @return static
     */
    public static function create(string $path, int $size = null): self
    {
        $fileSize = File::getHumanReadableSize($size ?: filesize($path));

        $maxFileSize = File::getHumanReadableSize(config('media-library.max_file_size'));

        return new static("File `{$path}` has a size of {$fileSize} which is greater than the maximum allowed {$maxFileSize}");
    }
}
