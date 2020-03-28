<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Image::class, function (Faker $faker) {
    $images = dirToArray(storage_path('app/public/images/posts'));
    return [
        'file' => '/images/posts/' .$faker->randomElement($images),
        'name' => $faker->word,
        'mime' => $faker->mimeType,
        'size' => mt_rand(1000,10000)
    ];
});
