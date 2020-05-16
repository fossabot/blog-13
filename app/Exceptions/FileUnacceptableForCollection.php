<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @modified    5/16/20, 12:52 AM
 *  @name          FileUnacceptableForCollection.php
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 *
 */

namespace App\Exceptions;

use App\Libraries\Media\HasMedia;
use App\Libraries\Media\MediaCollections\File;
use App\Libraries\Media\MediaCollections\MediaCollection;

/**
 * Class FileUnacceptableForCollection
 * @package App\Exceptions
 */
class FileUnacceptableForCollection extends FileCannotBeAdded
{
    /**
     * @param File $file
     * @param MediaCollection $mediaCollection
     * @param HasMedia $hasMedia
     * @return static
     */
    public static function create(File $file, MediaCollection $mediaCollection, HasMedia $hasMedia): self
    {
        $modelType = get_class($hasMedia);

        return new static("The file with properties `{$file}` was not accepted into the collection named `{$mediaCollection->name}` of model `{$modelType}` with id `{$hasMedia->getKey()}`");
    }
}
