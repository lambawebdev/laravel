<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Article;
use App\Models\ArticleHistory;

class ArticleUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $article;
    public $articleHistory;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Article $article, ArticleHistory $articleHistory)
    {
        $this->article = $article;
        $this->articleHistory = $articleHistory;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
