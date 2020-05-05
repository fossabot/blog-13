<?php

namespace App\Providers;

use App\Composers\BreadcrumbComposer;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Push the breadcrumbs to the view
        \View::composer('blog.*', BreadcrumbComposer::class);
    }
    /**
     * Register directive.
     *
     * @return void
     */
    public function registerDirective()
    {
        Blade::directive('laravelPWA', function () {
            return (new \LaravelPWA\Services\MetaService)->render();
        });
    }
}
