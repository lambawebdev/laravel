<?php

namespace App\Listeners;

use App\Events\ArticleModified;
use App\Models\ArticleHistory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class UpdateArticleHistory
{

    public $articleHistory;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(ArticleHistory $articleHistory)
    {
        $this->articleHistory = $articleHistory;
    }

    /**
     * Handle the event.
     *
     * @param  ArticleModified  $event
     * @return void
     */
    public function handle(ArticleModified $event)
    {
        $jsonArticle['article_id'] = $event->article->id;

        $this->articleHistory->article_changes = $event->article->getDirty();
        $this->articleHistory->article_id = $event->article->id;
        $this->articleHistory->user_id = Auth::id();
        
        $this->articleHistory->save();
    }
}
