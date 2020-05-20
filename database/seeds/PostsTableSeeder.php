<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 */

use App\Libraries\Post\MarkdownParse\YamlFrontMatter;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\Rate;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

/**
 * Class PostsTableSeeder
 */
class PostsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @param Faker $faker
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     * @return void
     */
    public function run(Faker $faker)
    {
        Model::unguard();

        $posts = self::defaultPost();
        $images = dirToArray(storage_path('app/public/img/posts'));

        foreach ($posts as  $post) {
            $content = YamlFrontMatter::parse($post);
            $post = Post::updateOrCreate([
                'user_id' => 1,
                'category_id' => $content->category,
                'title' => $content->title,
                'content_raw' => $content->body(),
                'subtitle' => isset($content->subtitle) ? $content->subtitle : null,
                'meta_description' => isset($content->meta_description) ? $content->meta_description: null,
                'is_draft' => isset($content->draft) ? $content->draft : false,
                'is_sticky' => isset($content->is_sticky) ? $content->is_sticky : false,
                'published_at' => now(),
                'type' => $content->type
            ]);
            try {
                $post->addMedia(storage_path('app/public/img/posts/' . $content->image))
                    ->preservingOriginal()
                    ->usingName($content->title)
                    ->toMediaCollection('images');
            } catch (\Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist $e) {
                $e->getMessage();
            } catch (\Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig $e) {
                $e->getMessage();
            }


            if (App::environment(['local', 'staging', 'testing'])) {
                $post->comments()->saveMany(factory(Comment::class, mt_rand(1, 10))->make());
                $post->rates()->saveMany(factory(Rate::class, 3)->make());
                $post->likes()->saveMany(factory(Like::class, mt_rand(1, 20))->make());
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
