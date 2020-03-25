<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * App\Models\Token
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Token newModelQuery()
 * @method static Builder|Token newQuery()
 * @method static Builder|Token query()
 * @method static Builder|Token whereCreatedAt($value)
 * @method static Builder|Token whereId($value)
 * @method static Builder|Token whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Token extends Model
{
    /**
     * Return a unique personal access token.
     */
    public static function generate(): string
    {
        do {
            $api_token = Str::random(60);
        } while (User::where('api_token', $api_token)->exists());

        return $api_token;
    }
}
