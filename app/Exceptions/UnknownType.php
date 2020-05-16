<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @modified    5/16/20, 12:52 AM
 *  @name          UnknownType.php
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 *
 */

namespace App\Exceptions;

/**
 * Class UnknownType
 * @package App\Exceptions
 */
class UnknownType extends FileCannotBeAdded
{
    /**
     * @return static
     */
    public static function create(): self
    {
        return new static('Only strings, FileObjects and UploadedFileObjects can be imported');
    }
}
