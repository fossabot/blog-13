<?php


namespace App\Repositories\Slug;

use Exception;

/**
 * Class InvalidOption
 * @package App\Repositories\Slug
 */
class InvalidOption extends Exception
{
    /**
     * @return InvalidOption
     */
    public static function missingFromField()
    {
        return new static('Could not determine which fields should be sluggified');
    }

    /**
     * @return InvalidOption
     */
    public static function missingSlugField()
    {
        return new static('Could not determine in which field the slug should be saved');
    }

    /**
     * @return InvalidOption
     */
    public static function invalidMaximumLength()
    {
        return new static('Maximum length should be greater than zero');
    }
}
