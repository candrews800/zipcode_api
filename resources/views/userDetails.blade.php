@extends('app')

@section('content')

    Api Key: {{ Auth::user()->apiKey }} <br>
    <strong>Requests in last: </strong> <br/>
    Second: {{ $api_requests['second'] }}<br/>
    Minute: {{ $api_requests['minute'] }}<br/>
    Hour: {{ $api_requests['hour'] }}

@stop