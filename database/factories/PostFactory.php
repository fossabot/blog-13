<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 */

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
$factory->define(\App\Models\Post::class, function (Faker $faker) {
    $title = $faker->unique()->realText(50, 2);
    return [
        'user_id' => mt_rand(1, 100),//factory(\App\Models\User::class)->create()->id,
        'category_id' => mt_rand(1, 30),
        'title' => $title,
        'subtitle' => \Str::limit($faker->realText(300, 3), 190),
        'content_raw' => join("\n\n", $faker->paragraphs(mt_rand(7, 16))),
        'meta_description' => "Meta for $title",
        'is_sticky' => $faker->boolean,
        'published_at' => $faker->dateTimeBetween('-1 Month', '+3 days'),
        'type' => $faker->randomElement(['blog', 'post', 'wiki', 'tutorial', 'book']),

    ];
});
