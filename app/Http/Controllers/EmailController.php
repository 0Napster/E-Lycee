<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function send(Request $request)
    {
        $title = $request->input('title');
        $name = $request->input('name');
        $address = $request->input('email');
        $content = $request->input('content');

        Mail::send('front.mail', ['title' => $title, 'name' => $name, 'address' => $address, 'content' => $content], function ($message) use ($title, $name, $content, $address)
        {
            $message->from($address, $name);
            $message->subject($title);
            $message->to('guillaume-perot@hotmail.fr');

        });

        return redirect('/contact')->with('messageFront', 'Message envoyé !');
    }
}
