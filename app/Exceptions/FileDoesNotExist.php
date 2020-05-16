<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @modified    5/16/20, 12:52 AM
 *  @name          FileDoesNotExist.php
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 *
 */

namespace App\Exceptions;

/**
 * Class FileDoesNotExist
 * @package App\Exceptions
 */
class FileDoesNotExist extends FileCannotBeAdded
{
    /**
     * @param string $path
     * @return static
     */
    public static function create(string $path): self
    {
        return new static("File `{$path}` does not exist");
    }
}
