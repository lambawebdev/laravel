<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications;

class newArticlesNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendArticles {startDate} {endDate}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Рассылает статьи всем пользователям за указанный в аргументах период';

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
        $data = $article::whereBetween('created_at', [$this->argument('startDate'), $this->argument('endDate')])->get();

        $users = User::all();

        Notification::send($users, new Notifications\SendArticles($data));
    }
}
