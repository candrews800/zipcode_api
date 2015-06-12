@extends('app')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <h1 class="page-header">Getting Started</h1>
        <p>To use the API, you must first register for an account. <a href="{{ url('auth/register') }}">Click here to sign up.</a></p>

        <p>After creating an account, you'll be given an API Key. This is your unique key that identifies yourself to us. We'll use it to verify
            that you are indeed a registered user as well as log all attempts you make.</p>

        <h3>Usage Limits</h3>
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
                        <td class="text-center">3</td>
                    </tr>
                    <tr>
                        <td>Per Minute</td>
                        <td class="text-center">40</td>
                    </tr>
                    <tr>
                        <td>Per Hour</td>
                        <td class="text-center">250</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <h3>Checking Status</h3>
        <p>You can check your status at anytime by signing in and going to <a href="{{ url('user') }}">My Account</a> from the drop-down in the main menu.</p>

        <h1 class="page-header">How to Use</h1>
        <p>Once you've signed up and received your API key, making requests to the API is very easy.</p>

        <h3>Get Zipcode Details</h3>
        <p>To get more information about a zip code, use the following link and the API will provide you with a JSON response related to the query.</p>
        <p><code>{{ url('get') }}/{zip_code}?api_key={your_api_key}</code></p>
        <p><strong>{zip_code}:</strong> This is where you will put in the zip code you want more information about. 33024, 96075, etc.</p>
        <p><strong>{your_api_key}:</strong> Put your unique API key here.</p>

        <h4>Example</h4>
        <div class="row">
            <div class="col-md-3">
                <p>Query</p>
            </div>
            <div class="col-md-9">
                <p><code>{{ url('get') }}/33024?api_key=WEkohYHA7OkS8R5RhM3N.ca</code></p>
            </div>
            <div class="col-md-6">
                <p>Response</p>
            </div>
            <div class="col-md-6">
            <pre>{
  "zipcode": 33024,
  "lat": 26.023567,
  "lon": -80.23851,
  "city": "Hollywood",
  "state": "FL"
}</pre>
            </div>
        </div>

        <h3>Get Nearby Zip Codes</h3>
        <p>To get zip codes that are within a certain radius, you can use the following.</p>
        <p><code>{{ url('near') }}/{zip_code}/{distance}?api_key={your_api_key}</code></p>
        <p><strong>{zip_code}:</strong> Center point of your search.</p>
        <p><strong>{distance}:</strong> Distance in <strong>miles</strong> of your radius around given zip code.</p>
        <p><strong>{your_api_key}:</strong> Put your unique API key here.</p>

        <h4>Example</h4>
        <div class="row">
            <div class="col-md-3">
                <p>Query</p>
            </div>
            <div class="col-md-9">
                <p><code>{{ url('near') }}/33024/25?api_key=WEkohYHA7OkS8R5RhM3N.ca</code></p>
            </div>
            <div class="col-md-6">
                <p>Response</p>
            </div>
            <div class="col-md-6">
                <div class="well">[ 33004, 33008, 33009, 33010, 33012, 33013, 33014, 33015, 33016, 33018, 33019, 33020, 33021, 33022, 33023, 33024, 33025, 33026, 33027, 33028, 33029, 33047, 33054, 33055, 33056 ]</div>
            </div>
        </div>

        <h3>Find Zip Codes for City, ST</h3>
        <p>For when you want to find all related zip codes for a city.</p>
        <p><code>{{ url('find') }}/{location}?api_key={your_api_key}</code></p>
        <p><strong>{location}:</strong> City, ST or City</p>
        <p><strong>{your_api_key}:</strong> Put your unique API key here.</p>

        <h4>Example</h4>
        <div class="row clearfix">
            <div class="col-md-3">
                <p>Query</p>
            </div>
            <div class="col-md-9">
                <p><code>{{ url('find') }}/Hollywood, FL?api_key=WEkohYHA7OkS8R5RhM3N.ca</code></p>
            </div>
            <div class="col-md-6">
                <p>Response</p>
            </div>
            <div class="col-md-6">
            <pre class="pre-scrollable">[
  {
    "zipcode": 33019,
    "lat": 26.018967,
    "lon": -80.12231,
    "city": "Hollywood",
    "state": "FL"
  },
  {
    "zipcode": 33020,
    "lat": 26.016984,
    "lon": -80.14925,
    "city": "Hollywood",
    "state": "FL"
  },
  {
    "zipcode": 33021,
    "lat": 26.023634,
    "lon": -80.18922,
    "city": "Hollywood",
    "state": "FL"
  },
  {
    "zipcode": 33022,
    "lat": 26.013368,
    "lon": -80.144217,
    "city": "Hollywood",
    "state": "FL"
  },
  {
    "zipcode": 33023,
    "lat": 25.989119,
    "lon": -80.21318,
    "city": "Hollywood",
    "state": "FL"
  },
  {
    "zipcode": 33024,
    "lat": 26.023567,
    "lon": -80.23851,
    "city": "Hollywood",
    "state": "FL"
  },
  {
    "zipcode": 33025,
    "lat": 25.990494,
    "lon": -80.27326,
    "city": "Hollywood",
    "state": "FL"
  },
  {
    "zipcode": 33026,
    "lat": 26.0267,
    "lon": -80.29443,
    "city": "Hollywood",
    "state": "FL"
  },
  {
    "zipcode": 33027,
    "lat": 25.981409,
    "lon": -80.34491,
    "city": "Hollywood",
    "state": "FL"
  },
  {
    "zipcode": 33029,
    "lat": 26.006373,
    "lon": -80.40212,
    "city": "Hollywood",
    "state": "FL"
  }
]</pre>
            </div>
        </div>

        <h1>API Endpoints</h1>

        <p>zipcode/{zipcode},{zipcode2}? - returns array of 1 or more Zipcode objects</p>
        <p>nearZipcode/{zipcode}/{distance} - returns array of 1 or more Zipcode objects</p>
        <p>search/{location}?number={limit}&skip={offset} - returns array of 1 or more Zipcode objects</p>
    </div>
</div>

@stop