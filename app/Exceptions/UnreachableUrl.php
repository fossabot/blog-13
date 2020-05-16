<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @modified    5/16/20, 12:52 AM
 *  @name          UnreachableUrl.php
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 *
 */

namespace App\Exceptions;

/**
 * Class UnreachableUrl
 * @package App\Exceptions
 */
class UnreachableUrl extends FileCannotBeAdded
{
    /**
     * @param string $url
     * @return static
     */
    public static function create(string $url): self
    {
        return new static("Url `{$url}` cannot be reached");
    }
}
