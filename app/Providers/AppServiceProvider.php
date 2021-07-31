<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use App\Service;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use function PHPUnit\TestFixture\func;

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
        $tagsCloud = Cache::tags('tags')->remember('tags', 3600, function() {
            return \App\Models\Tag::tagsCloud();
        });

        View::composer('layout.sidebar', function ($view) use ($tagsCloud) {
            $view->with('tagsCloud', $tagsCloud);
        });

        Blade::if('admin', function () {
            return auth()->check() && auth()->user()->roles()->where('name', 'admin')->exists();
        });

        Paginator::useBootstrap();
    }
}
