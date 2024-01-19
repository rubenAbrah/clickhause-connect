<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Clickhouse\Event;
use App\Models\Clickhouse\MyTable;
use App\Models\Clickhouse\LodataTest;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Lodata::discover(User::class);
        // \Lodata::discover(\App\Models\Admin\Book::class);
        \Lodata::discover(MyTable::class);
        // \Lodata::discover(LodataTest::class);
        // \Lodata::discover(Event::class);
    }
}
