<?php

namespace App\Http\Controllers;

use App\Events\ReportCreated;
use App\Http\Requests\NewsFormRequest;
use App\Http\Requests\TagsRequest;
use App\Models\Comment;
use App\Models\Tag;
use App\Service\TagsSynchronizer;
use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use App\Models\Article;
use App\Models\News;
use Illuminate\Support\Facades\Auth;


class ContactsController extends Controller
{
    public function index()
    {
        return view('contacts.index');
    }

    public function store()
    {
        $fields = $this->validate(request(), [
            'email' => 'required',
            'msg' => 'required',
        ]);

        $feedback = new Feedback();

        $feedback->email = $fields['email'];
        $feedback->msg = $fields['msg'];
        $feedback->save();
        Session::flash('notify', 'Запись создана');

        return redirect()->back();
    }

    public function show()
    {
        $feedback = Feedback::latest()->get();

        return view('contacts.feedback', compact('feedback'));
    }

    public function articles()
    {
        $page = \request('page') ?? 1;

        $articles = Cache::tags(['articles_admin'])->remember('articles|admin|page|' . $page, 3600, function () {
            return Article::with('tags')->latest()->paginate(20);
        });

        return view('articles.index', compact('articles'));
    }

    public function news()
    {
        $page = \request('page') ?? 1;

        $news = Cache::tags(['news_admin'])->remember('news|admin|page|' . $page, 3600, function () {
            return News::latest()->paginate(20);
        });

        return view('news.index', compact('news'));
    }

    public function newsEdit(News $news)
    {
        $this->authorize('update', $news);

        return view('news.edit', compact('news'));
    }

    public function newsUpdate(News $news, NewsFormRequest $request, TagsRequest $tagsRequest, TagsSynchronizer $tagsSynchronizer)
    {
        $this->authorize('update', $news);

        $validated = $request->validated();

        $news->update($validated);

        $tagsSynchronizer->sync($tagsRequest->enteredTagsCollection(), $news);

        Session::flash('notify', 'Новость обновлена');
        return redirect(route('news'));
    }

    public function newsDestroy(News $news)
    {
        $this->authorize('delete', $news);
        $news->delete();

        return redirect(route('news'));
    }

    public function report(Request $request)
    {
        if (array_key_exists('news', $request->all())) {
            $countNews = News::count();
        }

        if (array_key_exists('articles', $request->all())) {
            $countArticles = Article::count();
        }

        if (array_key_exists('comments', $request->all())) {
            $countComments = Comment::count();
        }

        if (array_key_exists('tags', $request->all())) {
            $countTags = Tag::count();
        }

        $reportData = [
            'articles' => $countArticles ?? null,
            'news' => $countNews ?? null,
            'comments' => $countComments ?? null,
            'tags' => $countTags ?? null,
            'request' => $request->all()
        ];

        if (count(array_keys($request->all())) > 0) {
            ReportCreated::dispatch($reportData);
            \App\Jobs\AdminReport::dispatch(Auth::user(), $reportData);
        }
    }
}
