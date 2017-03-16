<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('bot', 'BotController@handleBot');

Route::post('durian_data', 'WeatherConditionController@store');

Route::get('durian_image/{id}', 'WeatherConditionController@getImage');
Route::get('process_image/{id}', 'ProcessImageController@getImage');

Route::get('bot/medium_image/{id}', 'WeatherConditionController@getMediumImage');
Route::get('bot/small_image/{id}', 'WeatherConditionController@getSmallImage');

Route::post('process_image', 'ProcessImageController@store');