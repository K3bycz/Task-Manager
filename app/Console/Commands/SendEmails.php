<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\Hello;
use App\Models\MailModel;

class SendEmails extends Command
{
    protected $signature = 'send:emails';
    protected $description = 'Send queued emails';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $unsentEmails = MailModel::where('sent', false)->get();
        $emailContent = new Hello();

        foreach ($unsentEmails as $email) {
            $MailId = $email->id;

            try {
                Mail::to($email->recipient)->send($emailContent);
                $email->sent = true;
                $email->save();
                $this->info("Mail nr." . $MailId  . " kolejki został wysłany poprawnie");
            } catch (\Exception $e) {
                $this->info("Nie udało się wysłać maila nr." . $MailId);
            }
        }
    }
}
