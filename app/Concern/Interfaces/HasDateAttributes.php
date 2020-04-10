<?php


namespace App\Concern\Interfaces;


use Illuminate\Database\Eloquent\Builder;

/**
 * Interface HasDateAttributes
 * @package App\Concern\Interfaces
 */
interface HasDateAttributes
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
