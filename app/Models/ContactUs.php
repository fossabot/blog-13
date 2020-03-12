<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * Class ContactUs
 *
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string|null $phone
 * @property string $message
 * @property int $status
 * @property int $read
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactUs newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactUs newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ContactUs onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactUs query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactUs whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactUs whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactUs whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactUs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactUs whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactUs whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactUs wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactUs whereRead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactUs whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactUs whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactUs whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ContactUs withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ContactUs withoutTrashed()
 * @mixin \Eloquent
 */
class ContactUs extends Model
{
    use SoftDeletes, LogsActivity;
    /**
     * @var string
     */
    protected $table = 'contact_us';
    /**
     * @var array
     */
    protected $dates = ['deleted_at'];
    /**
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'subject', 'message', 'phone', 'status', 'read'
    ];
}
