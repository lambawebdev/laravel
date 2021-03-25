<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Step;
use App\Notifications\ArticleStepCompleted;

class CompletedStepsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Step $step)
    {
        $step->complete();

        $step->article->owner->notify(new ArticleStepCompleted());

        return back();
    }

    public function destroy(Step $step)
    {
        $step->incomplete();
        return back();
    }
}
