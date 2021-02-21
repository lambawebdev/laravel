<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Session;

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
}
