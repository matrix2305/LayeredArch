<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \Doctrine\DBAL\Types\Type;

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
     * @throws \Doctrine\DBAL\DBALException
     */
    public function boot()
    {
        Type::addType('uuid', 'Ramsey\Uuid\Doctrine\UuidType');
    }
}
