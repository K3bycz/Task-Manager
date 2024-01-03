<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class WeatherController extends Controller
{
    public function getWeather($latitude, $longitude)
    {
        $apiKey = env('WEATHER_MAP_KEY');

        $client = new Client();
        $response = $client->get("http://api.openweathermap.org/data/2.5/weather?lat=$latitude&lon=$longitude&appid=$apiKey&lang=pl");

        $data = json_decode($response->getBody());

        return $data;
    }
}