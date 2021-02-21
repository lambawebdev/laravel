<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use function Sodium\compare;

class ArticlesController extends Controller
{
    public function index()
    {
        $article = Article::latest()->get();

        return view('articles.index', compact('article'));
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store()
    {
        $fields = $this->validate(request(), [
            'slug' => 'required|unique:articles|regex:/^[a-z0-9 .\-]+$/i',
            'title' => 'required|min:5|max:100',
            'body' => 'required|max:255'
        ]);

        $article = new Article();

        $article->slug = $fields['slug'];
        $article->title = $fields['title'];
        $article->body = $fields['body'];

        $article->save();

        return redirect(route('articles'));
    }

    public function about()
    {
        return view('about');
    }
}
