<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Notifications;
use Illuminate\Support\Facades\Notification;

class sendArticlesForLastWeek extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendArticlesForLastWeek';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(Article $article)
    {
        $currentDate = Carbon::now();
        $agoDate = $currentDate->subDays($currentDate->dayOfWeek)->subWeek();

        $data = $article::whereBetween('created_at', [$currentDate, $agoDate])->get();

        $users = User::all();

        Notification::send($users, new Notifications\SendArticlesForLastWeek($data));


    }
}
