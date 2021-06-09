<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function index()
    {
        $countArticles = Article::count();
        $countNews = News::count();
        $mostArticlesHasUser = User::withCount('articles')->orderBy('articles_count', 'desc')->first();

        $longestArticle = Article::select('body', 'title', 'id')->orderByRaw('CHAR_LENGTH(body) DESC')->first();
        $shortestArticle = Article::select('body', 'title', 'id')->orderByRaw('CHAR_LENGTH(body) ASC')->first();

        $avgArticlesInActiveUser = User::withCount('articles')->get()->where('articles_count', '>', '1')->avg('articles_count');
        $mostChangableArticle = Article::withCount('history')->orderBy('history_count', 'desc')->first();
        $mostCommentableArticle = Article::withCount('comments')->orderBy('comments_count', 'desc')->first();

        $statisticData = [
            'totalArticles' => $countArticles,
            'totalNews' => $countNews,
            'mostArticlesUser' => $mostArticlesHasUser->name,
            'longestArticleTitle' => $longestArticle->title,
            'longestArticleId' => $longestArticle->id,
            'longestArticleLength' => mb_strlen($longestArticle->body),
            'shortestArticleTitle' => $shortestArticle->title,
            'shortestArticleId' => $shortestArticle->id,
            'shortestArticleLength' => mb_strlen($shortestArticle->body),
            'avgArticlesInActiveUser' => $avgArticlesInActiveUser,
            'mostChangebleArticleTitle' => $mostChangableArticle->title,
            'mostChangebleArticleId' => $mostChangableArticle->id,
            'mostCommentableArticleTitle' => $mostCommentableArticle->title,
            'mostCommentableArticleId' => $mostCommentableArticle->id,
        ];

        return view('statistics.index', compact('statisticData'));
    }
}
