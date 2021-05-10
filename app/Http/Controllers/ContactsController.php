<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Session;
use App\Models\Article;
use App\Models\News;

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

    public function articles(Article $article)
    {
        $articles = $article->with('tags')->latest()->paginate(20);

        return view('articles.index', compact('articles'));
    }

    public function news(News $news)
    {
        $news = $news->latest()->paginate(20);

        return view('news.index', compact('news'));
    }

}
