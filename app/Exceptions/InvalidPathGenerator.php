<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @modified    5/16/20, 12:52 AM
 *  @name          InvalidPathGenerator.php
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 *
 */

namespace App\Exceptions;

use App\Libraries\Media\Support\PathGenerator\PathGenerator;
use Exception;

/**
 * Class InvalidPathGenerator
 * @package App\Exceptions
 */
class InvalidPathGenerator extends Exception
{
    /**
     * @param string $class
     * @return static
     */
    public static function doesntExist(string $class): self
    {
        return new static("Path generator class `{$class}` doesn't exist");
    }

    /**
     * @param string $class
     * @return static
     */
    public static function doesNotImplementPathGenerator(string $class): self
    {
        $pathGeneratorClass = PathGenerator::class;

        return new static("Path generator class `{$class}` must implement `$pathGeneratorClass}`");
    }
}
