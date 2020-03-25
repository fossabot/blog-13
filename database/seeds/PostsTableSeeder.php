<?php

use Illuminate\Database\Seeder;

/**
 * Class PostsTableSeeder
 */
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Post::class, 100)->create()->each(function ($post) {
            $post->comments()->saveMany(factory(\App\Models\Comment::class, 3)->make());
        });
    }
}
