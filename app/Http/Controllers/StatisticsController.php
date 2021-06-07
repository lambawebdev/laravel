<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function index()
    {
        $countArticles = DB::table('articles')->count();
        $countNews = DB::table('news')->count();
        $mostArticlesUser = Article::withCount('owner')->orderBy('owner_id', 'asc')->first();
        $longestArticle = DB::table('articles')->max('body');
        $titleLongestArticle = DB::table('articles')->select('title', 'id')->where('body', '=', $longestArticle )->first();
        $countLongestCharacters = mb_strlen($longestArticle);
        $shortestArticle = DB::table('articles')->min('body');
        $titleShortestArticle = DB::table('articles')->select('title', 'id')->where('body', '=', $shortestArticle )->first();
        $countShortestCharacters = mb_strlen($shortestArticle);


        $statisticData = [
            'totalArticles' => $countArticles,
            'totalNews' => $countNews,
            'mostArticlesUser' => $mostArticlesUser->owner_id,
            'longestArticleTitle' => $titleLongestArticle->title,
            'longestArticleId' => $titleLongestArticle->id,
            'longestArticleLength' => $countLongestCharacters,
            'shortestArticleTitle' => $titleShortestArticle->title,
            'shortestArticleId' => $titleShortestArticle->id,
            'shortestArticleLength' => $countShortestCharacters,
        ];

        return view('statistics.index', compact('statisticData'));
    }
}
