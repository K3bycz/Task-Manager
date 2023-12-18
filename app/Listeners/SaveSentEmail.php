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
        return;
    }
}
