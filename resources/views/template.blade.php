<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>CANET BOT</title>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ url('/') }}">CANET</a>
        </div>
        <ul class="nav navbar-nav">
            <li @if(Request::is('weather')) class='active' @endif><a href="{{ url('/') }}">Home</a></li>
            <li @if(Request::is('condition')) class='active' @endif><a href="{{ url('condition') }}">Condition</a></li>
            <li @if(Request::is('api')) class='active' @endif><a href="{{ url('api') }}">API</a></li>
            <li @if(Request::is('graph')) class='active' @endif><a href="{{ url('graph') }}">Graph</a></li>
        </ul>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>
</body>
</html>