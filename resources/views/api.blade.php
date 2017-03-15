@extends('template')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Call Underground Weather history API for 5 day</div>
        <div class="panel-body">
            <h3>http://canet-bot.herokuapp.com/get_weather</h3>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Call Underground Weather history API for specific day</div>
        <div class="panel-body">
            <h3>http://canet-bot.herokuapp.com/get_daily_weather/{day}</h3>
            <hr>
            <p>Day is 04 or 13</p>
        </div>
    </div>
@stop