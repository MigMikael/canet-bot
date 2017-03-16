<?php

namespace App\Http\Controllers;

use App\Weather;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Log;
class WeatherController extends Controller
{
    public function index()
    {
        $weathers = Weather::all();
        return view('index', ['weathers' => $weathers]);
    }

    public function apiDoc()
    {
        return view('api');
    }

    public function graph()
    {
        $weathers = Weather::all();
        return view('graph', ['weathers' => $weathers]);
    }

    public function getDailyWeather($day)
    {
        $day = 'http://api.wunderground.com/api/2702e742f41cb897/history_201703'.$day.'/q/chanthaburi.json';
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
        $current = Carbon::now();

        for($i = 4; $i >= 0; $i--){
            $day = $current->previous($i);
            $string = $day->toDateTimeString();

            $temp = explode(' ',$string);
            $date = $temp[0];
            $date = str_replace('-', '', $date);

            $url = 'http://api.wunderground.com/api/2702e742f41cb897/history_'.$date.'/q/TH/chanthaburi.json';

            $data = self::curlGetRequest($url);
            $weather = [
                'temp' => $data['history']['dailysummary'][0]['meantempm'],
                'max_temp' => $data['history']['dailysummary'][0]['maxtempm'],
                'min_temp' => $data['history']['dailysummary'][0]['mintempm'],
                'date' => $data['history']['date']['pretty'],
            ];

            Weather::create($weather);
        }
        $weather = Weather::orderBy('id', 'desc')->take(5)->get();
        return $weather;
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

    public function getCurrentDate()
    {
        $current = Carbon::now();

        $two = $current->previous(2);
        $string = $two->toDateTimeString();

        $temp = explode(' ',$string);
        $date = $temp[0];
        $date = str_replace('-', '', $date);
        return $date;
    }
}
