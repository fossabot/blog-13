<?php


namespace App\Repositories\DateAttribute;


use Illuminate\Database\Eloquent\Builder;

/**
 * Interface DateAttributeInterface
 * @package App\Repositories\DateAttribute
 */
interface DateAttributeInterface
{
    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeLatest(Builder $query): Builder;

    /**
     * @param Builder $query
     * @param int $limit
     * @return Builder
     */
    public function scopeLastMonth(Builder $query, int $limit = 5): Builder;

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeLastWeek(Builder $query): Builder;

}
