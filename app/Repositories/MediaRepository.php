<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @modified    5/16/20, 12:52 AM
 *  @name          MediaRepository.php
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 *
 */

namespace App\MediaCollections;

use App\Libraries\Media\HasMedia;
use App\Models\Media;
use Closure;
use Illuminate\Database\Eloquent\Collection as DbCollection;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

/**
 * Class MediaRepository
 * @package App\MediaCollections
 */
class MediaRepository
{
    /**
     * @var Media
     */
    protected Media $model;

    /**
     * MediaRepository constructor.
     * @param Media $model
     */
    public function __construct(Media $model)
    {
        $this->model = $model;
    }

    /**
     * Get all media in the collection.
     *
     * @param \App\Libraries\Media\HasMedia $model
     * @param string $collectionName
     * @param array|callable $filter
     *
     * @return \Illuminate\Support\Collection
     */
    public function getCollection(HasMedia $model, string $collectionName, $filter = []): Collection
    {
        return $this->applyFilterToMediaCollection($model->loadMedia($collectionName), $filter);
    }

    /**
     * Apply given filters on media.
     *
     * @param \Illuminate\Support\Collection $media
     * @param array|callable $filter
     *
     * @return \Illuminate\Support\Collection
     */
    protected function applyFilterToMediaCollection(Collection $media, $filter): Collection
    {
        if (is_array($filter)) {
            $filter = $this->getDefaultFilterFunction($filter);
        }

        return $media->filter($filter);
    }

    /**
     * @return DbCollection
     */
    public function all(): DbCollection
    {
        return $this->model->all();
    }

    /**
     * @param string $modelType
     * @return DbCollection
     */
    public function getByModelType(string $modelType): DbCollection
    {
        return $this->model->where('model_type', $modelType)->get();
    }

    /**
     * @param array $ids
     * @return Collection
     */
    public function getByIds(array $ids): Collection
    {
        return $this->model->whereIn($this->model->getKeyName(), $ids)->get();
    }

    /**
     * @param string $modelType
     * @param string $collectionName
     * @return DbCollection
     */
    public function getByModelTypeAndCollectionName(string $modelType, string $collectionName): DbCollection
    {
        return $this->model
            ->where('model_type', $modelType)
            ->where('collection_name', $collectionName)
            ->get();
    }

    /**
     * @param string $collectionName
     * @return DbCollection
     */
    public function getByCollectionName(string $collectionName): DbCollection
    {
        return $this->model
            ->where('collection_name', $collectionName)
            ->get();
    }

    /**
     * @param array $filters
     * @return Closure
     */
    protected function getDefaultFilterFunction(array $filters): Closure
    {
        return function (Media $media) use ($filters) {
            foreach ($filters as $property => $value) {
                if (! Arr::has($media->custom_properties, $property)) {
                    return false;
                }

                if (Arr::get($media->custom_properties, $property) !== $value) {
                    return false;
                }
            }

            return true;
        };
    }
}
