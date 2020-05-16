<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @modified    5/16/20, 12:52 AM
 *  @name          MimeTypeNotAllowed.php
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 *
 */

namespace App\Exceptions;

/**
 * Class MimeTypeNotAllowed
 * @package App\Exceptions
 */
class MimeTypeNotAllowed extends FileCannotBeAdded
{
    /**
     * @param string $file
     * @param array $allowedMimeTypes
     * @return static
     */
    public static function create(string $file, array $allowedMimeTypes): self
    {
        $mimeType = mime_content_type($file);

        $allowedMimeTypes = implode(', ', $allowedMimeTypes);

        return new static("File has a mime type of {$mimeType}, while only {$allowedMimeTypes} are allowed");
    }
}
