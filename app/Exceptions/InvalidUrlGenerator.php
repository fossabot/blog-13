<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @modified    5/16/20, 12:52 AM
 *  @name          InvalidUrlGenerator.php
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 *
 */

namespace App\Exceptions;

use App\Libraries\Media\Support\UrlGenerator\UrlGenerator;
use Exception;

/**
 * Class InvalidUrlGenerator
 * @package App\Exceptions
 */
class InvalidUrlGenerator extends Exception
{
    /**
     * @param string $class
     * @return static
     */
    public static function doesntExist(string $class): self
    {
        return new static("Url generator class {$class} doesn't exist");
    }

    /**
     * @param string $class
     * @return static
     */
    public static function doesNotImplementUrlGenerator(string $class): self
    {
        $urlGeneratorClass = UrlGenerator::class;

        return new static("Url generator Class {$class} must implement `{$urlGeneratorClass}`");
    }
}
