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
$factory->define(\App\Models\Tag::class, function (Faker $faker) {
    $title = $faker->unique()->word;
    return [
        'tag' => $title,
        'meta_description' => " Meta for {$title}",
        'description' => join("\n\n", $faker->sentences(mt_rand(3, 7))),
    ];
});
