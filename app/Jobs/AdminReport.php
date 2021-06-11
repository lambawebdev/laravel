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

        $request = $this->request;

        if (array_key_exists('news', $request)) {
            $countNews = News::count();
        }

        if (array_key_exists('articles', $request)) {
            $countArticles = Article::count();
        }

        if (array_key_exists('comments', $request)) {
            $countComments = Comment::count();
        }

        if (array_key_exists('tags', $request)) {
            $countTags = Tag::count();
        }

        $reportData = [
            'articles' => $countArticles ?? '',
            'news' => $countNews ?? '',
            'comments' => $countComments ?? '',
            'tags' => $countTags ?? '',
            'request' => $request
        ];

        Mail::to($this->user->email)->send(new AdminReportCreated($reportData));
    }
}
