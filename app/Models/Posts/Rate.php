<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Posts\Rate
 *
 * @property int $id
 * @property int $post_id
 * @property int $user_id
 * @property int $rate
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Posts\Rate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Posts\Rate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Posts\Rate query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Posts\Rate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Posts\Rate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Posts\Rate wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Posts\Rate whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Posts\Rate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Posts\Rate whereUserId($value)
 * @mixin \Eloquent
 */
class Rate extends Model
{
    protected $table = 'posts_rates';
}
