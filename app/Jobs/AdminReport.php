<?php

namespace App\Jobs;

use App\Mail\AdminReportCreated;
use App\Models\Comment;
use App\Models\News;
use App\Models\Tag;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class AdminReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $user;
    public $request;

    public function __construct($user, $request)
    {
        $this->user = $user;
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $countArticles = Article::count();
        $countNews = News::count();
        $countComments = Comment::count();
        $countTags = Tag::count();

        $reportData = [
            'articles' => $countArticles,
            'news' => $countNews,
            'comments' => $countComments,
            'tags' => $countTags,
            'request' => $this->request
        ];

        Mail::to($this->user->email)->send(new AdminReportCreated($reportData));
    }
}
