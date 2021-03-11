<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Service;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Service\TagsSynchronizer::class, function ($app) {
            return new Service\TagsSynchronizer();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layout.sidebar', function ($view) {
            $view->with('tagsCloud', \App\Models\Tag::tagsCloud());
        });
    }
}
