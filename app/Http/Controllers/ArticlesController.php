<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticlesFormRequest;
use App\Http\Requests\TagsRequest;
use App\Models\ArticleHistory;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\Collection;
use App\Service\TagsSynchronizer;
use App\Service\PushallService;
use App\Mail\ArticleCreated;
use function Sodium\compare;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        /*$article = Article::where('owner_id', auth()->id())->with('tags')->latest()->get();*/
        $articles = auth()->user()->articles()->with('tags')->where('published','1')->latest()->paginate(10);


        return view('articles.index', compact('articles'));

    }

    public function show(Article $article)
    {
//        if ($article->owner_id !== auth()->id()) {
//            abort(403);
//        }

        $this->authorize('view', $article);

        return view('articles.show', compact('article'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(ArticlesFormRequest $request, TagsRequest $tagsRequest, TagsSynchronizer $tagsSynchronizer, Article $article, PushallService $pushall)
    {
        $validated = $request->validated();

        $article->slug = $validated['slug'];
        $article->title = $validated['title'];
        $article->body = $validated['body'];
        $article->owner_id = auth()->id();
        $article->published = $request->has('published');

        $article->save();

        $tagsSynchronizer->sync($tagsRequest->enteredTagsCollection(), $article);

       $pushall->pushAll($validated['title']);

        return redirect(route('articles'));
    }

    public function edit(Article $article)
    {
            $this->authorize('update', $article);
            return view('articles.edit', compact('article'));
    }

    public function update(ArticlesFormRequest $request, TagsRequest $tagsRequest,Article $article, TagsSynchronizer $tagsSynchronizer)
    {
        $validated = $request->validated();
        $article->published = (int)$request->has('published');

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
