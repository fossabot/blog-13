<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @modified    5/6/20, 1:56 AM
 *  @name          Rate.php
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 *
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Rate
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rate query()
 * @mixin \Eloquent
 */
class Rate extends Model
{
    protected $table = 'rates';
}
