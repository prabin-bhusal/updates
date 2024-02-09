<?php

namespace App\Providers;

use App\Repositories\NewsRepository;
use App\Repositories\NewsRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind('App\Repositories\NewsRepositoryInterface', 'App\Repositories\NewsRepository');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind('App\Repositories\NoticeRepositoryInterface', 'App\Repositories\NoticeRepository');
        $this->app->bind('App\Repositories\EventRepositoryInterface', 'App\Repositories\EventRepository');
    }
}
