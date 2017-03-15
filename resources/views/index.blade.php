@extends('template')

@section('content')
    <div class="jumbotron">
        <h1>สภาพอากาศย้อนหลัง</h1>
        @if(sizeof($weathers) > 0)
            <p>{{ $weathers[0]->date }} - {{ $weathers[sizeof($weathers) - 1]->date }}</p>
        @endif
    </div>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>Date</th>
            <th>Temperature</th>
            <th>Max Temperature</th>
            <th>Min Temperature</th>
            <th>Timestamps</th>
        </tr>
        </thead>
        <tbody>
        @foreach($weathers as $weather)
            <tr>
                <td>{!! $weather->date !!}</td>
                <td>{!! $weather->temp !!}</td>
                <td>{!! $weather->max_temp !!}</td>
                <td>{!! $weather->min_temp !!}</td>
                <td>{!! $weather->created_at !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop