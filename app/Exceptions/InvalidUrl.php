<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @modified    5/16/20, 12:52 AM
 *  @name          InvalidUrl.php
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 *
 */

namespace App\Exceptions;

use Exception;

/**
 * Class InvalidUrl
 * @package App\Exceptions
 */
class InvalidUrl extends Exception
{
    /**
     * @param string $url
     * @return static
     */
    public static function doesNotStartWithProtocol(string $url)
    {
        return new static("Could not add `{$url}` because it does not start with either `http://` or `https://`");
    }
}
