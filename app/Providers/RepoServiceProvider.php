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
        $this->app->bind(Repo\FeesInterface::class, Repo\FeesRepo::class);
        $this->app->bind(Repo\Fee_invoiceInterface::class, Repo\Fee_invoiceRepo::class);
        $this->app->bind(Repo\PaymentRepositoryInterface::class, Repo\PaymentRepository::class);
        $this->app->bind(Repo\ProcessingFeeRepositoryInterface::class, Repo\ProcessingFeeRepository::class);
        $this->app->bind(Repo\ReceiptStudentsRepositoryInterface::class, Repo\ReceiptStudentsRepository::class);

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
