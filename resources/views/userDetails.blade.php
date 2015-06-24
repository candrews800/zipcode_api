@extends('app')

@section('content')

    <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
    <p><strong>API Key:</strong> {{ Auth::user()->apiKey->api_key }}</p>

    <table class="table">
        <thead>
            <tr>
                <th>Period</th>
                <th>My Requests</th>
                <th>Max Requests</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Seconds</td>
                <td>{{ $api_requests['second']?$api_requests['second']:0 }}</td>
                <td>3</td>
            </tr>
            <tr>
                <td>Minutes</td>
                <td>{{ $api_requests['minute']?$api_requests['minute']:0 }}</td>
                <td>40</td>
            </tr>
            <tr>
                <td>Hours</td>
                <td>{{ $api_requests['hour']?$api_requests['hour']:0 }}</td>
                <td>250</td>
            </tr>
        </tbody>
    </table>

@stop