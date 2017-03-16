@extends('template')

@section('content')
    <div class="jumbotron">
        <h1>Forecast Weather</h1>
    </div>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>Date</th>
            <th>Min Temperature</th>
            <th>Max Temperature</th>
            <th>Conditions</th>
            <th>Timestamp</th>
        </tr>
        </thead>
        <tbody>
        @foreach($weathers as $weather)
            <tr>
                <td>{!! $weather->date !!}</td>
                <td>{!! $weather->min_temp !!}</td>
                <td>{!! $weather->max_temp !!}</td>
                <td>{!! $weather->conditions !!}</td>
                <td>{!! $weather->created_at !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop