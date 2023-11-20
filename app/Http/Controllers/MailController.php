<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\Hello;


class MailController extends Controller
{
    
    public function sendMail()
    {
        $recipient = 'piotr.kapustka@onet.pl';

        Mail::to($recipient)->send(new Hello());

        return redirect('/user')->with('message', 'Mail został wysłany pomyślnie!');
    }
}
