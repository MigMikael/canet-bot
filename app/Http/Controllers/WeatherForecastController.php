<?php

namespace App\Http\Controllers;

use App\WeatherForecast;
use Illuminate\Http\Request;

class WeatherForecastController extends Controller
{
    public function index()
    {
        $forecasts = WeatherForecast::all();
        return view('forecast', ['weathers' => $forecasts]);
    }

    public function getForecastWeather()
    {
        $url = 'http://api.wunderground.com/api/2702e742f41cb897/forecast10day/q/TH/chanthaburi.json';
        $data = self::curlGetRequest($url);

        $forecastDay = $data['forecast']['simpleforecast']['forecastday'];

        for ($i = 0; $i < 5;$i++){
            $forecast = [
                'date' => $forecastDay[$i]['date']['pretty'],
                'max_temp' => $forecastDay[$i]['high']['celsius'],
                'min_temp' => $forecastDay[$i]['low']['celsius'],
                'conditions' => $forecastDay[$i]['conditions'],
            ];

            WeatherForecast::create($forecast);
        }
        $lastFiveRow = WeatherForecast::orderBy('id', 'desc')->take(5)->get();
        return $lastFiveRow;
    }

    public function curlGetRequest($url)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'
        ));

        $response = curl_exec($curl);
        $data = json_decode($response, true);
        curl_close($curl);

        return $data;
    }
}
