<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store()
    {
        // dd(\request()->all());
        // Validation
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        // Send an Email
        Mail::to('test@test.com')->send(new ContactFormMail($data));

        // This Another way of doing
        // session()->flash('message', 'Thanks for your message. We\'ll be in touch.');

        return redirect('contact')->with('message', 'Thanks for your message. We\'ll be in touch.');
    }
}
