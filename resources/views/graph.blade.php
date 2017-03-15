@extends('template')

@section('content')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data2 = google.visualization.arrayToDataTable([
                ['Time', 'Temp', 'Max Temp', 'Min Temp'],
                @foreach($weathers as $weather)
                ['{{ $weather->date }}', {{ $weather->temp }}, {{ $weather->max_temp }}, {{ $weather->min_temp }}],
                @endforeach
            ]);

            var options2 = {
                title: 'Temperature History 5 Day',
                hAxis: {title: 'Time',  titleTextStyle: {color: '#333'}},
                vAxis: {minValue: 0}
            };

            var chart2 = new google.visualization.AreaChart(document.getElementById('area_chart'));
            chart2.draw(data2, options2);
        }
    </script>


    <div class="jumbotron">
        <h1>Visualization data</h1>
        <p>change the way our analysts work with data - look at data differently, more imaginatively</p>
    </div>
    <div id="area_chart" style="height: 400px"></div>

@stop