<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticlesFormRequest;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Session;
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

    public function store(ArticlesFormRequest $request, Article $article)
    {
        $validated = $request->validated();

        $article->slug = $validated['slug'];
        $article->title = $validated['title'];
        $article->body = $validated['body'];

        $article->save();
        return redirect(route('articles'));
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(ArticlesFormRequest $request, Article $article)
    {
        $validated = $request->validated();
        $article->update($validated);

        Session::flash('notify', 'Запись создана');
        return redirect(route('articles'));
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect(route('articles'));
    }

    public function about()
    {
        return view('about');
    }
}
