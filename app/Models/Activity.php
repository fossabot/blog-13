<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Activitylog\Models\Activity as Model;

class Activity extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function getUser(): HasOne
    {
        return $this->hasOne(User::class,'id','causer_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function getSubject(): HasOne
    {
        return $this->hasOne(User::class,'id','causer_id');
    }
}
