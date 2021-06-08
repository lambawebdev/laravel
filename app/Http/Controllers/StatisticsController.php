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

        $longestArticle = Article::select('body')->max('body');
        $titleLongestArticle = Article::select('title', 'id')->whereRaw('body = (select max(`body`) from articles)')->first();
        $countLongestCharacters = mb_strlen($longestArticle);

        $shortestArticle = Article::min('body');
        $titleShortestArticle = Article::select('title', 'id')->whereRaw('body = (select min(`body`) from articles)')->first();
        $countShortestCharacters = mb_strlen($shortestArticle);

        $avgArticlesInActiveUser = User::withCount('articles')->get()->where('articles_count', '>', '1')->avg('articles_count');
        $mostChangableArticle = Article::withCount('history')->orderBy('history_count', 'desc')->first();
        $mostCommentableArticle = Article::withCount('comments')->orderBy('comments_count', 'desc')->first();

        $statisticData = [
            'totalArticles' => $countArticles,
            'totalNews' => $countNews,
            'mostArticlesUser' => $mostArticlesHasUser->name,
            'longestArticleTitle' => $titleLongestArticle->title,
            'longestArticleId' => $titleLongestArticle->id,
            'longestArticleLength' => $countLongestCharacters,
            'shortestArticleTitle' => $titleShortestArticle->title,
            'shortestArticleId' => $titleShortestArticle->id,
            'shortestArticleLength' => $countShortestCharacters,
            'avgArticlesInActiveUser' => $avgArticlesInActiveUser,
            'mostChangebleArticleTitle' => $mostChangableArticle->title,
            'mostChangebleArticleId' => $mostChangableArticle->id,
            'mostCommentableArticleTitle' => $mostCommentableArticle->title,
            'mostCommentableArticleId' => $mostCommentableArticle->id,
        ];

        return view('statistics.index', compact('statisticData'));
    }
}
