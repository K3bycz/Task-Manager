<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\Hello;
use App\Models\MailModel;
use App\Jobs\SendMailJob;

class MailController extends Controller
{
    
    public function sendMail()
    {
        $recipient = 'piotr.kapustka@onet.pl';

        // Stare wysyłanie maila
        // $emailContent = new Hello();
        // Mail::to($recipient)->send($emailContent);
    
        // Dekompresja htmla
        // $data = MailModel::find(1)->content;
        // $uncompressedContent = gzuncompress(base64_decode($data));
        // dd($uncompressedContent);
        
        SendMailJob::dispatch($recipient)->onQueue('send_mail');
        //php artisan queue:work <- wymagane do wysyłania maili.

        return redirect('/user')->with('message', 'Mail został wysłany!');
    }
}
