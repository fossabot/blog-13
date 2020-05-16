<?php

namespace App\Libraries\Media\MediaCollections\Models\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Trait HasUuid
 * @package App\Libraries\Media\MediaCollections\Models\Concerns
 */
trait HasUuid
{
    /**
     *
     */
    public static function bootHasUuid()
    {
        static::creating(function (Model $model) {
            if (empty($model->uuid)) {
                $model->uuid = (string) Str::uuid();
            }
        });
    }

    /**
     * @param string $uuid
     * @return null|Model
     */
    public static function findByUuid(string $uuid): ?Model
    {
        return static::where('uuid', $uuid)->first();
    }
}
