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
$factory->define(\App\Models\Category::class, function (Faker $faker) {
    $titles = ['book', 'video', 'blog', 'test', 'docker', 'git', 'code', 'deploy', 'monitor', 'monitor', 'plan', 'release', 'Continuous Integration', 'Continuous Delivery', 'Continuous Deployment', 'server', 'Internet Of Think'];
    return [
        'title' => $faker->randomElement($titles),
        'subtitle' => \Str::limit($faker->sentence(mt_rand(10, 20)), 252),
        'description' => $faker->sentence(mt_rand(10, 20)),
    ];
});
