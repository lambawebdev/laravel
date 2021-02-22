<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\FormRequest;
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
        /*$fields = $this->validate(request(), [
            'slug' => 'required|unique:articles|regex:/^[a-z0-9 .\-]+$/i',
            'title' => 'required|min:5|max:100',
            'body' => 'required|max:255'
        ]);*/

        $article = new Article();

        $formRequest = new FormRequest();

        $fields = $formRequest->validate($article);

        $article->slug = $fields['slug'];
        $article->title = $fields['title'];
        $article->body = $fields['body'];

        $article->save();
        return redirect(route('articles'));
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Article $article)
    {
        /*$fields = $this->validate(request(), [
            'title' => 'required|min:5|max:100',
            'body' => 'required|max:255'
        ]);*/

        $formRequest = new FormRequest();

        $fields = $formRequest->validate($article);

        $article->update($fields);
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
