<?php

namespace App\Http\Controllers;
use App\WeatherCondition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class WeatherConditionController extends Controller
{
    public function index()
    {
        $weathers = WeatherCondition::all();
        return view('current', ['weathers' => $weathers]);
    }

    public function getImage($id)
    {
        $weather_condition = WeatherCondition::findOrFail($id);

        return response($weather_condition->image)->header('Content-Type', 'image/jpg');
    }

    public function store(Request $request)
    {
        $image = $request->file('image');
        $humidity_sensor = $request->get('humidity');
        $humidity_sensor = (int)$humidity_sensor;

        $url = 'http://api.wunderground.com/api/2702e742f41cb897/conditions/q/TH/Bangkok.json';
        $data = self::curlGetRequest($url);
        $weather_condition = [
            'temp' => $data['current_observation']['temp_c'],
            'weather' => $data['current_observation']['weather'],
            'pressure' => $data['current_observation']['pressure_mb'],
            'humidity_sensor' => $humidity_sensor,
            'date' => $data['current_observation']['observation_time'],
            'image' => File::get($image)
        ];

        WeatherCondition::create($weather_condition);
        return response()->json(['msg' => 'store data complete']);
    }

    public function getCurrentWeather()
    {
        $url = 'http://api.wunderground.com/api/2702e742f41cb897/conditions/q/TH/Bangkok.json';
        $data = self::curlGetRequest($url);

        $weather_condition = [
            'temp' => $data['current_observation']['temp_c'],
            'weather' => $data['current_observation']['weather'],
            'pressure' => $data['current_observation']['pressure_mb'],
            'date' => $data['current_observation']['observation_time'],
        ];

        $weather_condition = WeatherCondition::create($weather_condition);
        return $weather_condition;
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