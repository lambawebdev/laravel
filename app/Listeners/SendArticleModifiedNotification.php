<?php

namespace App\Listeners;

use App\Events\ArticleModified;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendArticleModifiedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ArticleModified  $event
     * @return void
     */
    public function handle(ArticleModified $event)
    {
        \Mail::to($event->article->owner->email)->send(
            new \App\Mail\ArticleModified($event->article)
        );
    }
}
