<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Step;
use App\Models\Article;

class ArticleStepsController extends Controller
{
    public function store(Article $article)
    {
        /*Step::create([
            'description' => \request('description'),
            'article_id' => $article->id
        ]);*/

        /*$article->addStep([
            'description' => \request('description'),
        ]);*/

        $article->addStep(\request()->validate([
            'description' => 'required|min:5'
        ]));

        return back();
    }

/*    public function update(Step $step)
    {
        $method = \request()->has('completed')? 'complete' : 'incomplete';

        $step->{$method}();

        return back();
    }*/
}
