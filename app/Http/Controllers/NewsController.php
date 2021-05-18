<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsFormRequest;
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

    public function create()
    {
        return view('news.create');
    }

    public function store(NewsFormRequest $request, News $news)
    {
        $validated = $request->validated();

        $news->title = $validated['title'];
        $news->body = $validated['body'];

        $news->save();

        return redirect(route('news'));
    }
}