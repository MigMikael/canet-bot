<?php

namespace App\Http\Controllers;

use App\Weather;
use Illuminate\Http\Request;
use Log;
class WeatherController extends Controller
{
    public function index()
    {
        $weathers = Weather::all();
        return view('index', ['weathers' => $weathers]);
    }

    public function getDailyWeather($day)
    {
        $day = 'http://api.wunderground.com/api/2702e742f41cb897/history_201703'.$day.'/q/TH/Bangkok.json';
        $data = self::curlGetRequest($day);
        $weather = [
            'temp' => $data['history']['dailysummary'][0]['meantempm'],
            'max_temp' => $data['history']['dailysummary'][0]['maxtempm'],
            'min_temp' => $data['history']['dailysummary'][0]['mintempm'],
            'date' => $data['history']['date']['pretty'],
        ];
        $weather = Weather::create($weather);

        return $weather;
    }

    public function getWeather()
    {
        $days = [];
        $days[0] = 'http://api.wunderground.com/api/2702e742f41cb897/history_20170310/q/TH/Bangkok.json';
        $days[1] = 'http://api.wunderground.com/api/2702e742f41cb897/history_20170311/q/TH/Bangkok.json';
        $days[2] = 'http://api.wunderground.com/api/2702e742f41cb897/history_20170312/q/TH/Bangkok.json';
        $days[3] = 'http://api.wunderground.com/api/2702e742f41cb897/history_20170313/q/TH/Bangkok.json';
        $days[4] = 'http://api.wunderground.com/api/2702e742f41cb897/history_20170314/q/TH/Bangkok.json';

        foreach ($days as $day){
            $data = self::curlGetRequest($day);
            //Log::info("##### ".$data['history']['dailysummary'][0]['meantempm']);
            $weather = [
                'temp' => $data['history']['dailysummary'][0]['meantempm'],
                'max_temp' => $data['history']['dailysummary'][0]['maxtempm'],
                'min_temp' => $data['history']['dailysummary'][0]['mintempm'],
                'date' => $data['history']['date']['pretty'],
            ];

            Weather::create($weather);
        }

        $allWeather = Weather::all();
        return $allWeather;
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
