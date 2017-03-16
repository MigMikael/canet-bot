<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeatherForecast extends Model
{
    public $timestamps = true;
    protected $table = 'weathers_forecast';
    protected $fillable = [
        'date',
        'min_temp',
        'max_temp',
        'conditions',
    ];
}
