<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @modified    5/16/20, 12:52 AM
 *  @name          InvalidTinyJpg.php
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 *
 */

namespace App\Exceptions;

use App\Libraries\Media\Support\File;
use Exception;

/**
 * Class InvalidTinyJpg
 * @package App\Exceptions
 */
class InvalidTinyJpg extends Exception
{
    /**
     * @param string $tinyImageDestinationPath
     * @return static
     */
    public static function doesNotExist(string $tinyImageDestinationPath): self
    {
        return new static("The expected tiny jpg at `{$tinyImageDestinationPath}` does not exist");
    }

    /**
     * @param string $tinyImageDestinationPath
     * @return static
     */
    public static function hasWrongMimeType(string $tinyImageDestinationPath): self
    {
        $foundMimeType = File::getMimeType($tinyImageDestinationPath);

        return new static("Expected the file at {$tinyImageDestinationPath} have mimetype `image/jpeg`, but found a file with mimetype `{$foundMimeType}`");
    }
}
