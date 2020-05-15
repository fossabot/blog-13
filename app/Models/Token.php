<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * App\Models\Token
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Token newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Token newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Token query()
 * @mixin \Eloquent
 */
class Token extends Model
{
    /**
     * Return a unique personnal access token.
     */
    public static function generate(): string
    {
        do {
            $api_token = Str::random(60);
        } while (User::where('api_token', $api_token)->exists());

        return $api_token;
    }
}
