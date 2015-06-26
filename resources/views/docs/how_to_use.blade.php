<?php
$page = 'how-to-use';
?>

@extends('docs.template')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <h1>How To Use</h1>

            <h3 id="request-format" class="page-header">Request Format</h3>
            <p>All requests must follow the form:</p>
            <p><code>http://zzipcode.com/{route}?api_key={api_key}</code></p>

            <h3 id="request-example" class="page-header">Request Example</h3>
            <p><code>http://zzipcode.com/get/33024?api_key=1234567890</code></p>

            <h3 id="response-format" class="page-header">Response Format</h3>
            <p>All responses to query's will return a JSON object in the following format:</p>
            <pre>{
    "data": {
        [responseResults]
    }
}</pre>

            <h3 id="errors" class="page-header">Errors</h3>
            <p>All errors will be in following format:</p>
            <pre>{
    "error":{
        "code":403,
        "http_code":4031,
        "message":"The key provided does not match any records."
    }
}</pre>

            <table class="table">
                <thead>
                <tr>
                    <th>Error Code</th>
                    <th>HTTP Code</th>
                    <th>Error Message</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>100</td>
                    <td>404</td>
                    <td>No records were found for the given parameters.</td>
                </tr>
                <tr>
                    <td>429</td>
                    <td>429</td>
                    <td>You've reached your limit for the amount of requests allowed.</td>
                </tr>
                <tr>
                    <td>4030</td>
                    <td>403</td>
                    <td>No Api Key was provided.</td>
                </tr>
                <tr>
                    <td>4030</td>
                    <td>403</td>
                    <td>The key provided does not match any records.</td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>

@stop