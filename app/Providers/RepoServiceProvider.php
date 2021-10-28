<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repo;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Repo\TeacherInterface::class, Repo\TeacherRepo::class);
        $this->app->bind(Repo\StudentInterface::class, Repo\StudentRepo::class);
        $this->app->bind(Repo\PromotionInterface::class, Repo\PromotionRepo::class);
        $this->app->bind(Repo\GraduatedInterface::class, Repo\GraduatedRepo::class);
        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
