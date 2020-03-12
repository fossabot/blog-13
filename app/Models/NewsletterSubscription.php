<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\NewsletterSubscription
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsletterSubscription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsletterSubscription newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NewsletterSubscription onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsletterSubscription query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsletterSubscription whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsletterSubscription whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsletterSubscription whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsletterSubscription whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsletterSubscription whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NewsletterSubscription withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NewsletterSubscription withoutTrashed()
 * @mixin \Eloquent
 */
class NewsletterSubscription extends Model
{
    use SoftDeletes, LogsActivity;
    protected $fillable = [ 'name', 'email' ];
}
