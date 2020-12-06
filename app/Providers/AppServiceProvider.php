<?php

namespace App\Providers;

use App\Models\PurchaseRequest;
use App\Observers\PurchaseRequestObserver;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        PurchaseRequest::observe(PurchaseRequestObserver::class);
    }
}
