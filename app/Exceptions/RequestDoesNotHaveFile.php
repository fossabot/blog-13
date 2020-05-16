<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @modified    5/16/20, 12:52 AM
 *  @name          RequestDoesNotHaveFile.php
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 *
 */

namespace App\Exceptions;

/**
 * Class RequestDoesNotHaveFile
 * @package App\Exceptions
 */
class RequestDoesNotHaveFile extends FileCannotBeAdded
{
    /**
     * @param string $key
     * @return static
     */
    public static function create(string $key): self
    {
        return new static("The current request does not have a file in a key named `{$key}`");
    }
}
