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
$factory->define(\App\Models\Comment::class, function (Faker $faker) {
    return [
        'user_id' => mt_rand(1, 10), //factory(\App\Models\User::class)->create()->id,
        'title' => $faker->sentence,
        'content' => \Str::limit($faker->sentence(mt_rand(3, 5))),
        'published_at' => $faker->dateTimeBetween('-1 Month', '+3 days'),
        'approved' => $faker->boolean
    ];
});
