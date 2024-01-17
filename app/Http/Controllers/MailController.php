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
        $emailContent = new Hello();
        $mailSubject = $emailContent->getMailSubject();
        $mailBody = $emailContent->getMailBody(); //skompresowane

        try {
            Mail::to($recipient)->send($emailContent);
            $sent = true;
        } catch (\Exception $e) {
            $sent = false;
        }

        $mail = new MailModel([
            'recipient' => $recipient,
            'subject' => $mailSubject,
            'body' => $mailBody,
            'sent' => $sent,
        ]);
        $mail->save();

        return redirect('/user')->with('message', 'Mail został wysłany!');
    }
}
