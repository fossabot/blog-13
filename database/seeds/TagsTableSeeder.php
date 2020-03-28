<?php

use Illuminate\Database\Seeder;

/**
 * Class TagsTableSeeder
 */
class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment(['local', 'staging', 'testing'])) {
            factory(\App\Models\Tag::class, 10)->create();

            $tags = \App\Models\Tag::all();
            $post = \App\Models\Post::all();
            $image = \App\Models\Image::all();


            self::taggable($post, $tags);
            self::taggable($image, $tags);
        }
    }

    /**
     * @param $model
     * @param $tags
     */
    private static function taggable($model, $tags): void
    {
        $model->each(function ($post) use ($tags) {
            $post->tags()->attach(
                $tags->random(rand(1, 9))->pluck('id')->toArray()
            );
        });
    }
}
