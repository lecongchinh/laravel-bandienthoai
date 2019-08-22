<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;


class ContactController extends Controller
{
    public function index() {
        return view('client.contact');
    }

    public function sendContact()
    {
        $data['title'] = "This is Test Mail Tuts Make";
        Mail::send('emails.orders.shipped', $data, function ($message) {
            // $message->from('john@johndoe.com', 'John Doe');
            // $message->sender('john@johndoe.com', 'John Doe');
            $message->to('lecongchinh.ptit@gmail.com', 'Le Cong Chính');
            // $message->cc('john@johndoe.com', 'John Doe');
            // $message->bcc('john@johndoe.com', 'John Doe');
            // $message->replyTo('john@johndoe.com', 'John Doe');
            $message->subject('Lê Công Chính');
            // $message->priority(3);
            // $message->attach('pathToFile');
        });

        // if (Mail::success()) {
        //     return response()->Fail('Sorry! Please try again latter');
        //   }else{
            return response()->json('Great! Successfully send in your mail');
        //   }
    }
}
