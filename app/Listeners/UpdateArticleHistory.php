<?php

namespace App\Listeners;

use App\Events\ArticleUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class UpdateArticleHistory
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
     * @param  ArticleUpdated  $event
     * @return void
     */
    public function handle(ArticleUpdated $event)
    {
        $jsonArticle['article_id'] = $event->article->id;
        $jsonArticle['title_before'] = $event->article->title;
        $jsonArticle['body_before'] = $event->article->body;
        $jsonArticle['title_after'] = \request('title');
        $jsonArticle['body_after'] = \request('body');

        $jsonArticle = json_encode($jsonArticle);

        $event->articleHistory->article_changes = $jsonArticle;
        $event->articleHistory->article_id = $event->article->id;
        $event->articleHistory->user_id = Auth::id();
        $event->articleHistory->save();
    }
}
