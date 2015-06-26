<?php
    $page = 'getting-started';
?>

@extends('docs.template')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <h1>Getting Started</h1>
            <h3 id="register" class="page-header">Registering for API Key</h3>
            <p>To use the API, you must first register for an account. @if(Auth::guest())<a href="{{ url('auth/register') }}">Click here to sign up.</a>@endif</p>

            <p>After creating an account, you'll be given an API Key. This is your unique key that identifies yourself to us. We'll use it to verify
                that you are indeed a registered user as well as log all attempts you make.</p>

            <h3 id="usage" class="page-header">Usage Limits</h3>
            <p>As of now, this API is free for usage. There are limits on the amount of requests that can be made in a given amount of time, however.
                See the following for usage limits.</p>

            <div class="row">
                <div class="col-lg-4">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th></th>
                            <th class="text-center">Max Requests</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Per Second</td>
                            <td class="text-center">5</td>
                        </tr>
                        <tr>
                            <td>Per Minute</td>
                            <td class="text-center">60</td>
                        </tr>
                        <tr>
                            <td>Per Hour</td>
                            <td class="text-center">250</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <h3 id="status" class="page-header">Checking Status</h3>
            <p>You can check your status at anytime by signing in and going to <a href="{{ url('user') }}">My Account</a> from the drop-down in the main menu.</p>
        </div>
    </div>

@stop