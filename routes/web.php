<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->action('WeatherController@index');
});

Route::get('weather', 'WeatherController@index');
Route::get('condition', 'WeatherConditionController@index');
Route::get('analyze', 'ProcessImageController@index');
Route::get('api', 'WeatherController@apiDoc');
Route::get('graph', 'WeatherController@graph');

Route::get('get_weather', 'WeatherController@getWeather');
Route::get('get_daily_weather/{day}', 'WeatherController@getDailyWeather');

Route::get('get_current_weather', 'WeatherConditionController@getCurrentWeather');