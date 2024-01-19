<?php

namespace App\Providers;

use App\Services\PriceCalculateServices;
use Illuminate\Support\ServiceProvider;

class PriceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PriceCalculateServices::class, function ($app) {
            return new PriceCalculateServices();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
