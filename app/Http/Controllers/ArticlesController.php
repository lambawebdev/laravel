<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticlesFormRequest;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\Collection;
use App\Service\TagsSynchronizer;
use function Sodium\compare;

class ArticlesController extends Controller
{
    public function index()
    {
        $article = Article::with('tags')->latest()->get();
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

    public function update(ArticlesFormRequest $request, Article $article, TagsSynchronizer $tagsSynchronizer)
    {
        $validated = $request->validated();
        $article->update($validated);

        /** @var  $articleTags Collection */
        /*$articleTags = $article->tags->keyBy('name');

        $tags = collect(explode(',', request('tags')))->keyBy(function ($item) { return $item; });

        $tagsToAttach = $tags->diffKeys($articleTags);
        $tagsToDetach = $articleTags->diffKeys($tags);

        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $article->tags()->attach($tag);
        }

        foreach ($tagsToDetach as $tag) {
            $tags->tags()->detach($tag);
        }*/

        $tags = collect(explode(',', request('tags')))->keyBy(function ($item) { return $item; });

        $tagsSynchronizer->sync($tags, $article);

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
