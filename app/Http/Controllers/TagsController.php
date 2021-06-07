<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagsController extends Controller
{
    public function index(Tag $tag)
    {
        $articles = $tag->articles()->with('tags')->paginate(10);

        return view('articles.index', compact('articles'));
    }

    public function news(Tag $tag)
    {
        $news = $tag->news()->with('tags')->paginate(10);

        return view('news.index', compact('news'));
    }
}
