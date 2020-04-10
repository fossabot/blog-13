<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

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
$factory->define(\App\Models\Image::class, function (Faker $faker) {
    $images = dirToArray(storage_path('app/public/images/posts'));
    return [
        'file' => 'images/posts/' .$faker->randomElement($images),
        'name' => $faker->word,
        'mime' => $faker->mimeType,
        'size' => mt_rand(1000, 10000)
    ];
});
