<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Media;
use App\Models\Post;
use App\Models\User;
use App\Observers\CategoryObserver;
use App\Observers\CommentObserver;
use App\Observers\MediaObserver;
use App\Observers\PostObserver;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;

/**
 * Class ObserverServiceProvider
 * @package App\Providers
 */
class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Category::observe(CategoryObserver::class);
        Post::observe(PostObserver::class);
        User::observe(UserObserver::class);
        Comment::observe(CommentObserver::class);
        Media::observe(MediaObserver::class);
    }
}
