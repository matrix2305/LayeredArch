<?php

namespace App\Providers;

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
        $this->app->bind('AppCore\Interfaces\IPostsRepository', 'Infrastructure\Repository\PostsRepository');
        $this->app->bind('AppCore\Interfaces\ILog', 'Infrastructure\Log\Log');
        $this->app->bind('AppCore\Interfaces\IPostsService', 'AppCore\Services\PostsService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
