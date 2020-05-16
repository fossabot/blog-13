<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @modified    5/16/20, 12:52 AM
 *  @name          InvalidBase64Data.php
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 *
 */

namespace App\Exceptions;

/**
 * Class InvalidBase64Data
 * @package App\Exceptions
 */
class InvalidBase64Data extends FileCannotBeAdded
{
    /**
     * @return static
     */
    public static function create(): self
    {
        return new static('Invalid base64 data provided');
    }
}
