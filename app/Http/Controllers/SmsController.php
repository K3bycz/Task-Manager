<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SmsController extends Controller
{
    public function sendSMS(){

        $key = env('VONAGE_KEY');
        $secret = env('VONAGE_SECRET');
        $recipient = env('RECIPIENT'); //48phonenumber
        $basic  = new \Vonage\Client\Credentials\Basic($key, $secret);
        $client = new \Vonage\Client($basic);

        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS($recipient, 'Piotr', 'Dziala, Panie kierowniku!')
        );
        
        $message = $response->current();
        
        if ($message->getStatus() == 0) {
            return redirect('/user')->with('message', 'SMS został wysłany pomyślnie!');
        } else {
            return redirect('/user')->with('message', 'Błąd! Nie udało się wysłać SMSa');
        }
    }
}
