<?php

namespace App\Providers;

use App\Repositories\Admin\BlogRepository;
use App\Repositories\Admin\BlogRepositoryInterface;
use App\Services\Admin\BlogService;
use App\Services\Admin\BlogServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(abstract: BlogRepositoryInterface::class, concrete: BlogRepository::class);
        $this->app->bind(abstract: BlogServiceInterface::class, concrete: BlogService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
