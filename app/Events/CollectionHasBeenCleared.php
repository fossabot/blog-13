<?php

namespace App\Events;

use App\Libraries\Media\HasMedia;
use Illuminate\Queue\SerializesModels;

/**
 * Class CollectionHasBeenCleared
 * @package App\Events
 */
class CollectionHasBeenCleared
{
    use SerializesModels;

    /**
     * @var HasMedia
     */
    public HasMedia $model;

    /**
     * @var string
     */
    public string $collectionName;

    /**
     * CollectionHasBeenCleared constructor.
     * @param HasMedia $model
     * @param string $collectionName
     */
    public function __construct(HasMedia $model, string $collectionName)
    {
        $this->model = $model;

        $this->collectionName = $collectionName;
    }
}
