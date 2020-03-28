<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Posts\Rate::class, function (Faker $faker) {
    return [
        'user_id' => mt_rand(1,100),
        'post_id' => mt_rand(1,100),
        'rate' => mt_rand(1,5)
    ];
});
