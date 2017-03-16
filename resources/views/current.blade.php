@extends('template')

@section('content')
    <div class="jumbotron">
        <h1>Current Weather</h1>
    </div>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>DateTime</th>
            <th>Temperature</th>
            <th>Weather</th>
            <th>pressure</th>
            <th>humidity</th>
            <th>humidity_sensor</th>
            <th>image</th>
        </tr>
        </thead>
        <tbody>
        @foreach($weathers as $weather)
            <tr>
                <td>{!! $weather->created_at !!}</td>
                <td>{!! $weather->temp !!}</td>
                <td>{!! $weather->weather !!}</td>
                <td>{!! $weather->pressure !!}</td>
                <td>{!! $weather->humidity !!}</td>
                <td>{!! $weather->humidity_sensor !!}</td>
                <td>
                    <a href="{{ url('api/durian_image/'.$weather->id) }}">view</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop