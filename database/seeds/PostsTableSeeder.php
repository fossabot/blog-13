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
        $posts = self::defaultPost();
        foreach ($posts as $title => $content) {
            $post = \App\Models\Post::firstOrCreate([
                'user_id' => 1,
                'category_id' => 1,
                'subtitle' => $title,
                'title' => $title,
                'content_raw' => $content,
                'meta_description' => 'Meta' .$title,
                'published_at' => now(),
                'type' => 'page'
            ]);
        }

        if (App::environment(['local', 'staging', 'testing'])) {
            factory(\App\Models\Post::class, 100)->create()->each(function ($post) {
                $post->images()->saveMany(factory(\App\Models\Image::class, 3)->make());
                $post->comments()->saveMany(factory(\App\Models\Comment::class, 3)->make());
                $post->rates()->saveMany(factory(\App\Models\Posts\Rate::class, 3)->make());
            });
        }

    }


    /**
     * Seed default users
     *
     * @return array
     */
    protected static function defaultPost()
    {
        return  [
            'Privacy and Policy'  => file_get_contents(database_path('contents/privacy.md')),
            'about'  => file_get_contents(database_path('contents/about.md')),
        ];
    }
}
