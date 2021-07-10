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
use App\Events\ReportCreated;

class AdminReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public object $user;
    public array $reportData;

    public function __construct($user, array $reportData)
    {
        $this->user = $user;
        $this->reportData = $reportData;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user->email)->send(new AdminReportCreated($this->reportData));
    }
}
