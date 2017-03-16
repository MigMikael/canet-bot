<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeatherCondition extends Model
{
    public $timestamps = true;
    protected $table = 'weathers_condition';
    protected $fillable = [
        'temp',
        'weather',
        'pressure',
        'humidity',
        'humidity_sensor',
        'date',
        'image'
    ];
}
