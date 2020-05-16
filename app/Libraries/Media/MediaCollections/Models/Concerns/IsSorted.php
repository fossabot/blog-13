<?php

namespace App\Libraries\Media\MediaCollections\Models\Concerns;

use Illuminate\Database\Eloquent\Builder;

trait IsSorted
{
    /**
     *
     */
    public function setHighestOrderNumber(): void
    {
        $orderColumnName = $this->determineOrderColumnName();

        $this->$orderColumnName = $this->getHighestOrderNumber() + 1;
    }

    /**
     * @return int
     */
    public function getHighestOrderNumber(): int
    {
        return (int) static::max($this->determineOrderColumnName());
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy($this->determineOrderColumnName());
    }

    /*
     * This function reorders the records: the record with the first id in the array
     * will get order 1, the record with the second it will get order 2, ...
     *
     * A starting order number can be optionally supplied.
     */
    /**
     * @param array $ids
     * @param int $startOrder
     */
    public static function setNewOrder(array $ids, int $startOrder = 1): void
    {
        foreach ($ids as $id) {
            $model = static::find($id);

            $orderColumnName = $model->determineOrderColumnName();

            $model->$orderColumnName = $startOrder++;

            $model->save();
        }
    }

    /**
     * @return string
     */
    protected function determineOrderColumnName(): string
    {
        return $this->sortable['order_column_name'] ?? 'order_column';
    }

    /**
     * @return bool
     */
    public function shouldSortWhenCreating(): bool
    {
        return $this->sortable['sort_when_creating'] ?? true;
    }
}
