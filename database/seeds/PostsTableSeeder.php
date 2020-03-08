<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

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
