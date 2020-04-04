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

        foreach ($posts as  $post) {
            $content = \App\Repositories\MarkdownParse\YamlFrontMatter::parse($post);
            $post = \App\Models\Post::updateOrCreate([
                'user_id' => 1,
                'category_id' => $content->category,
                'subtitle' => $content->subtitle,
                'title' => $content->title,
                'content_raw' => $content->body(),
                'meta_description' => $content->meta_description,
                'is_draft' => $content->draft,
                'is_sticky' => $content->is_sticky,
                'published_at' => now(),
                'type' => $content->type
            ]);
            if (App::environment(['local', 'staging', 'testing'])) {
                $post->images()->saveMany(factory(\App\Models\Image::class, 3)->make());
                $post->comments()->saveMany(factory(\App\Models\Comment::class, 3)->make());
                $post->rates()->saveMany(factory(\App\Models\Posts\Rate::class, 3)->make());
            }
        }
    }


    /**
     * Seed default Posts
     *
     * @return array
     */
    protected static function defaultPost()
    {
        $contents = dirToArray(storage_path('app/contents/'));
        $data = [];
        foreach ($contents as $key => $content) {
            $data[] = file_get_contents(storage_path('app/contents/' .$content));
        }
        return  $data;
    }
}
