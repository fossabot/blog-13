<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @modified    5/16/20, 12:52 AM
 *  @name          DiskDoesNotExist.php
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 *
 */

namespace App\Exceptions;

/**
 * Class DiskDoesNotExist
 * @package App\Exceptions
 */
class DiskDoesNotExist extends FileCannotBeAdded
{
    /**
     * @param string $diskName
     * @return static
     */
    public static function create(string $diskName): self
    {
        return new static("There is no filesystem disk named `{$diskName}`");
    }
}
