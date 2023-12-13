<?php

namespace App\Jobs;

use App\Mail\Hello;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $recipient;
    public $tries = 5; 

    public function __construct($recipient)
    {
        $this->recipient = $recipient;
    }

    public function handle(): bool
    {
        try{
            $emailContent = new Hello();
            Mail::to($this->recipient)->send($emailContent);
            return true;
        } catch (\Exception $e) {
            $this->release(5); 
            throw $e;
        }
    }
    
}
