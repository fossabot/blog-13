<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @modified    5/16/20, 12:52 AM
 *  @name          MediaCannotBeUpdated.php
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 *
 */

namespace App\Exceptions;

use App\Models\Media;
use Exception;

/**
 * Class MediaCannotBeUpdated
 * @package App\Exceptions
 */
class MediaCannotBeUpdated extends Exception
{
    /**
     * @param string $collectionName
     * @param Media $media
     * @return static
     */
    public static function doesNotBelongToCollection(string $collectionName, Media $media): self
    {
        return new static("Media id {$media->getKey()} is not part of collection `{$collectionName}`");
    }
}
