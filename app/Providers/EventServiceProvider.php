<?php

namespace App\Providers;

use App\Listeners\SendArticleCreatedNotification;
use App\Listeners\SendArticleModifiedNotification;
use App\Listeners\SendArticleDeletedNotification;
use App\Events\ArticleCreated;
use App\Events\ArticleModified;
use App\Events\ArticleDeleted;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ArticleCreated::class => [
            SendArticleCreatedNotification::class,
        ],
        ArticleModified::class => [
            SendArticleModifiedNotification::class,
        ],
        ArticleDeleted::class => [
            SendArticleDeletedNotification::class,
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
