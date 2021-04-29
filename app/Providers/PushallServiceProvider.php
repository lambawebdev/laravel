<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Service;

class PushallServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Service\PushallService::class, function ($app) {
            return new Service\PushallService();
        });
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
