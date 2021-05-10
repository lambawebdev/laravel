<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Session;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(News $news)
    {
        $news = $news->latest()->paginate(10);

        return view('news.index', compact('news'));
    }

    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    public function edit(News $news)
    {
        $this->authorize('update', $news);

        return view('news.edit', compact('news'));
    }

    public function update(News $news)
    {
        $this->authorize('update', $news);

        $news->update([
            'title' => \request('title'),
            'body' => \request('body'),
        ]);

        Session::flash('notify', 'Новость обновлена');
        return redirect(route('news'));
    }

    public function destroy(News $news)
    {

        $this->authorize('delete', $news);
        $news->delete();

        return redirect(route('news'));
    }
}
