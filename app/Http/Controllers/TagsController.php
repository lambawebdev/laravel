<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagsController extends Controller
{
    public function index(Tag $tag)
    {

        $article = $tag->articles()->with('tags')->get();

        return view('articles.index', compact('article'));
    }
}
