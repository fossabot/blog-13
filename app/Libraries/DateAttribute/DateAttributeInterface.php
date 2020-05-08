<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 */

namespace App\Libraries\DateAttribute;


use Illuminate\Database\Eloquent\Builder;

/**
 * Interface DateAttributeInterface
 * @package App\Libraries\DateAttribute
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
