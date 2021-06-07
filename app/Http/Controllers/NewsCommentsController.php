<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsCommentsController extends Controller
{
    public function store(News $news)
    {

        $validate = \request()->validate([
            'description' => 'required|min:5',
        ]);

        $validate['user_id' ] = Auth::id();

        $news->addComment($validate);

        return back();
    }
}
