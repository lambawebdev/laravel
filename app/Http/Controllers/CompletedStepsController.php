<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Step;

class CompletedStepsController extends Controller
{
    public function store(Step $step)
    {
        $step->complete();
        return back();
    }

    public function destroy(Step $step)
    {
        $step->incomplete();
        return back();
    }
}
