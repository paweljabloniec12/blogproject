<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    function post_message(Request $request){

        $request->validate([
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9|max:15', // walidacja telefonu
            'name' => 'required|min:2|max:50',
            'title' => 'required|min:2|max:100',
            'message' => 'required|min:10'
        ]);

        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'title' => $request->title,
            'message' => $request->message,
        ];
        
        Mail::to('examplemail@gmail.com')->send(new ContactFormMail($data));

        return redirect()->back()->with('message', 'Thanks for reaching out. Your message has been sent successfully!');
    }
}