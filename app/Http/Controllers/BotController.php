<?php

namespace App\Http\Controllers;

use App\WeatherCondition;
use Illuminate\Http\Request;
use App\Weather;
class BotController extends Controller
{
    public function handleBot(Request $request)
    {
        $events = $request->all();

        if (!is_null($events['events'])) {
            // Loop through each event
            foreach ($events['events'] as $event) {
                // Reply only when message sent is in 'text' format
                if ($event['type'] == 'message' && $event['message']['type'] == 'text') {

                    $text = $event['message']['text'];
                    $replyToken = $event['replyToken'];

                    if (strpos($text, 'เหนื่อยไหม') !== false) {
                        $weathers = Weather::orderBy('id', 'desc')->take(5)->get();

                        $messages1 = [
                            'type' => 'text',
                            'text' => 'วันที่ '.$weathers[4]->date.' Temp = '.$weathers[4]->temp.' C/ Max Temp = '.$weathers[4]->max_temp.' C/ Min Temp = '.$weathers[4]->min_temp.' C'
                        ];

                        $messages2 = [
                            'type' => 'text',
                            'text' => 'วันที่ '.$weathers[3]->date.' Temp = '.$weathers[3]->temp.' C/ Max Temp = '.$weathers[3]->max_temp.' C/ Min Temp = '.$weathers[3]->min_temp.' C'
                        ];

                        $messages3 = [
                            'type' => 'text',
                            'text' => 'วันที่ '.$weathers[2]->date.' Temp = '.$weathers[2]->temp.' C/ Max Temp = '.$weathers[2]->max_temp.' C/ Min Temp = '.$weathers[2]->min_temp.' C'
                        ];

                        $messages4 = [
                            'type' => 'text',
                            'text' => 'วันที่ '.$weathers[1]->date.' Temp = '.$weathers[1]->temp.' C/ Max Temp = '.$weathers[1]->max_temp.' C/ Min Temp = '.$weathers[1]->min_temp.' C'
                        ];

                        $messages5 = [
                            'type' => 'text',
                            'text' => 'วันที่ '.$weathers[0]->date.' Temp = '.$weathers[0]->temp.' C/ Max Temp = '.$weathers[0]->max_temp.' C/ Min Temp = '.$weathers[0]->min_temp.' C'
                        ];

                        $data = [
                            'replyToken' => $replyToken,
                            'messages' => [
                                $messages1,
                                $messages2,
                                $messages3,
                                $messages4,
                                $messages5
                            ],
                        ];
                    }
                    elseif (strpos($text, 'รายงาน') !== false){
                        $condition = WeatherCondition::all()->last();
                        $messages1 = [
                            'type' => 'text',
                            'text' => 'อุณหภูมิ '.$condition->temp.' C'
                        ];

                        $messages2 = [
                            'type' => 'text',
                            'text' => 'สภาพอากาศ '.$condition->weather
                        ];

                        $messages3 = [
                            'type' => 'text',
                            'text' => 'ความกดอากาศ '.$condition->pressure.' pha'
                        ];

                        $messages4 = [
                            'type' => 'text',
                            'text' => 'ความชื้นของดิน '.$condition->humidity_sensor.' %'
                        ];

                        $messages5 = [
                            'type' => 'image',
                            'originalContentUrl' => 'https://canet-bot.herokuapp.com/api/durian_image/'.$condition->id,
                            'previewImageUrl' => 'https://canet-bot.herokuapp.com/api/durian_image/'.$condition->id
                        ];

                        $data = [
                            'replyToken' => $replyToken,
                            'messages' => [
                                $messages1,
                                $messages2,
                                $messages3,
                                $messages4,
                                $messages5
                            ],
                        ];
                    }
                    else {
                        $messages1 = [
                            'type' => 'text',
                            'text' => 'เราเหนื่อยมาก เรางง'
                        ];

                        $data = [
                            'replyToken' => $replyToken,
                            'messages' => [
                                $messages1,
                            ],
                        ];
                    }
                    $url = 'https://api.line.me/v2/bot/message/reply';
                    $post = json_encode($data);

                    self::sendPostRequest($url, $post);
                }
            }
        }
        //echo 'OK';
    }

    public function sendPostRequest($url, $data)
    {
        $access_token = 'QPsc4ilD6NPkDhWDvusiLj0qPgif+cC4a9t6OA/lA6N8fp5MnZS3NCIyoNhu6KrhADFj4wOET3ibdPUpZjAis5J6r6Jg1WqNj7aNyZG8EEziEZ6xectP6jGHAodORS4PhpN3GgVE8LNM6n9uShQnZwdB04t89/1O/w1cDnyilFU=';
        $header = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => $header,
            CURLOPT_FOLLOWLOCATION => 1,
        ));

        $response = curl_exec($curl);
        //$data = json_decode($response, true);
        curl_close($curl);
    }
}
