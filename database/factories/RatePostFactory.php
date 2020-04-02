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
$factory->define(\App\Models\Posts\Rate::class, function (Faker $faker) {
    return [
        'user_id' => mt_rand(1, 100),
        'post_id' => mt_rand(1, 100),
        'rate' => mt_rand(1, 5)
    ];
});
