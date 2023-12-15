<?php

namespace App\Listeners;

use Illuminate\Mail\Events\MessageSent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use App\Events\AddTaskEvent;

class EventListener
{
    public function handle(AddTaskEvent $event)
    {
        Log::info('Event wysłany', ['event' => $event]);
    }
}
