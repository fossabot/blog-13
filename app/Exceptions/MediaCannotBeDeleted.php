<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @modified    5/16/20, 12:52 AM
 *  @name          MediaCannotBeDeleted.php
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 *
 */

namespace App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MediaCannotBeDeleted
 * @package App\Exceptions
 */
class MediaCannotBeDeleted extends Exception
{
    /**
     * @param $mediaId
     * @param Model $model
     * @return static
     */
    public static function doesNotBelongToModel($mediaId, Model $model): self
    {
        $modelClass = get_class($model);

        return new static("Media with id `{$mediaId}` cannot be deleted because it does not exist or does not belong to model {$modelClass} with id {$model->getKey()}");
    }
}
