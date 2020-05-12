<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 */

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Media;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
$factory->define(Media::class, function (Faker $faker) {
    $images = dirToArray(storage_path('app/public/images/posts'));
    return [
        'file' => $faker->randomElement($images),
        'name' => $faker->word,
        'mime' => 'image/jpg',
        'size' => mt_rand(1000, 10000)
    ];
});
