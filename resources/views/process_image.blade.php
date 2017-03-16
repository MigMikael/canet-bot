@extends('template')

@section('content')
    <div class="jumbotron">
        <h1>Analyze Image</h1>
    </div>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>DateTime</th>
            <th>Amount</th>
            <th>Image</th>
        </tr>
        </thead>
        <tbody>
        @foreach($process_images as $process_image)
            <tr>
                <td>{!! $process_image->created_at !!}</td>
                <td>{!! $process_image->area !!}</td>
                <td>
                    <a href="{{ url('api/process_image/'.$process_image->id) }}">view</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop