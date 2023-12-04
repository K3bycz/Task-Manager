<?php

namespace App\Listeners;

use Illuminate\Mail\Events\MessageSent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\MailModel;

class SaveSentEmail
{
    public function handle(MessageSent $event)
    {
        $mail = new \App\Mail\Hello();
        $compressedContent = $mail->getContent();

        $recipients = $event->message->getTo();
        $recipientAddress = $recipients[0]->getAddress();

        MailModel::create([
            'recipient' => $recipientAddress,
            'subject' => $event->message->getHeaders()->get('subject')->getBody(),
            'content' => $compressedContent,
        ]);

        return;
    }
}
