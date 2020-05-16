<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @modified    5/16/20, 12:52 AM
 *  @name          InvalidConversion.php
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 *
 */

namespace App\Exceptions;

use Exception;

/**
 * Class InvalidConversion
 * @package App\Exceptions
 */
class InvalidConversion extends Exception
{
    /**
     * @param string $name
     * @return static
     */
    public static function unknownName(string $name): self
    {
        return new static("There is no conversion named `{$name}`");
    }
}
