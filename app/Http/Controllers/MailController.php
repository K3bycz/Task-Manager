<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\Hello;
use App\Models\MailModel;

class MailController extends Controller
{
    
    public function sendMail()
    {
        $recipient = 'piotr.kapustka@onet.pl';
        $emailContent = new Hello();

        Mail::to($recipient)->send($emailContent);

        // Dekompresja htmla
        // $data = MailModel::find(1)->content;
        // $uncompressedContent = gzuncompress(base64_decode($data));
        // dd($uncompressedContent);

        return redirect('/user')->with('message', 'Mail został wysłany pomyślnie!');
    }
}
