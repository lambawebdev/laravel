<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class ArticleCommentsController extends Controller
{
    public function store(Article $article)
    {

        $validate = \request()->validate([
                'description' => 'required|min:5',
            ]);

        $validate['user_id' ] = Auth::id();

        $article->addComment($validate);

        return back();
    }
}
