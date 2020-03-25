<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Master\Bank
 *
 * @property int $id
 * @property string $name
 * @property string $alias
 * @property string $company
 * @property string $code
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Master\Bank newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Master\Bank newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Master\Bank query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Master\Bank whereAlias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Master\Bank whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Master\Bank whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Master\Bank whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Master\Bank whereName($value)
 * @mixin \Eloquent
 */
class Bank extends Model
{
    /**
     * @var string
     */
    protected $table = 'banks';
}
