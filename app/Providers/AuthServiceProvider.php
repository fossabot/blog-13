<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Comment' => 'App\Policies\CommentPolicy',
        'App\Models\Post' => 'App\Policies\PostPolicy',
        'App\Models\User' => 'App\Policies\UserPolicy',
        'App\Models\Media' => 'App\Policies\MediaPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        \Gate::define('edit-settings', function ($user) {
            return $user->isAdmin;
        });

        \Gate::define('update-post', function ($user, $post) {
            return $user->id === $post->user_id;
        });

        //
        // Implicitly grant "Super Admin" role all permissions
        // This works in the app by using gate-related functions like auth()->user->can() and @can()
        \Gate::before(function ($user, $ability) {
            return $user->hasRole('Super Admin') ? true : null;
        });
        Passport::routes();
        Passport::tokensExpireIn(now()->addDays(15));

        Passport::refreshTokensExpireIn(now()->addDays(30));

        Passport::personalAccessTokensExpireIn(now()->addMonths(6));
    }
}
