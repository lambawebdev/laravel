<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticlesFormRequest;
use App\Http\Requests\TagsRequest;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\Collection;
use App\Service\TagsSynchronizer;
use function Sodium\compare;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $article = Article::where('owner_id', auth()->id())->with('tags')->latest()->get();
        return view('articles.index', compact('article'));
    }

    public function show(Article $article)
    {
        if ($article->owner_id !== auth()->id()) {
            abort(403);
        }
        return view('articles.show', compact('article'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(ArticlesFormRequest $request, TagsRequest $tagsRequest, TagsSynchronizer $tagsSynchronizer, Article $article)
    {
        $validated = $request->validated();

        $article->slug = $validated['slug'];
        $article->title = $validated['title'];
        $article->body = $validated['body'];
        $article->owner_id = auth()->id();

        $article->save();

        $tagsSynchronizer->sync($tagsRequest->enteredTagsCollection(), $article);

        return redirect(route('articles'));
    }

    public function edit(Article $article)
    {
        if ($article->owner_id !== auth()->id()) {
            abort(403);
        }
        return view('articles.edit', compact('article'));
    }

    public function update(ArticlesFormRequest $request, TagsRequest $tagsRequest,Article $article, TagsSynchronizer $tagsSynchronizer)
    {
        $validated = $request->validated();
        $article->update($validated);

        $tagsSynchronizer->sync($tagsRequest->enteredTagsCollection(), $article);

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
