<?php

namespace App\Providers;

use App\Repositories\Eloquent\ProjectRepository;
use App\Repositories\Eloquent\TaskRepository;
use App\Repositories\Interfaces\ProjectRepositoryInterface;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use App\Services\Implementations\ProjectService;
use App\Services\Implementations\TaskService;
use App\Services\Interfaces\ProjectServiceInterface;
use App\Services\Interfaces\TaskServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProjectRepositoryInterface::class, ProjectRepository::class);
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);

        $this->app->bind(ProjectServiceInterface::class, ProjectService::class);
        $this->app->bind(TaskServiceInterface::class, TaskService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
