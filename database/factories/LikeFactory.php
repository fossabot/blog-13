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
$factory->define(\App\Models\Like::class, function (Faker $faker) {
    return [
        'likeable_type' => $faker->randomElement(['App\Models\Post', 'App\Models\Media', 'App\Models\Comment']),
        'likeable_id' => mt_rand(1,100),
        'user_id' => mt_rand(1,100)
    ];
});
