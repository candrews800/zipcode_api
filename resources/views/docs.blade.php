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

        <h3>Checking Status</h3>
        <p>You can check your status at anytime by signing in and going to <a href="{{ url('user') }}">My Account</a> from the drop-down in the main menu.</p>

        <h1 class="page-header">How to Use</h1>
        <p>Once you've signed up and received your API key, making requests to the API is very easy.</p>

        <h3>Get Zipcode Details</h3>
        <p>To get more information about a zip code, use the following link and the API will provide you with a JSON response related to the query.</p>
        <p><code>{{ url('get') }}/{zip_code}?api_key={your_api_key}</code></p>
        <p><strong>Optional:</strong><code>&embed=near:{distance}</code></p>

        <h5 class="text-muted">Examples</h5>
        <h4>Get details for zipcode 33024</h4>
        <p><strong>GET</strong> <code>{{ url('get') }}/33024?api_key=WEkohYHA7OkS8R5RhM3N.ca</code></p>
        <pre>{
  "data": [
    {
      "zipcode": 33024,
      "lat": 26.011,
      "lon": -80.16,
      "city": "HOLLYWOOD",
      "state": "FL"
    }
  ]
}</pre>

        <h4>Get details for zipcode and all nearby zipcodes within 15 miles</h4>

        <p><strong>GET</strong> <code>{{ url('get') }}/33024?api_key=WEkohYHA7OkS8R5RhM3N.ca&embed=near:15</code></p>
        <pre class="pre-scrollable">{
   "data":[
      {
         "zipcode":33024,
         "lat":26.02,
         "lon":-80.16,
         "city":"HOLLYWOOD",
         "state":"FL",
         "near":[
            {
               "zipcode":33004,
               "lat":26.05,
               "lon":-80.14,
               "city":"DANIA",
               "state":"FL",
               "distance":2.42
            },
            {
               "zipcode":33301,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33302,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33303,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33304,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33305,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33306,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33307,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33308,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33309,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33310,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33311,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33312,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33313,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33314,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33315,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33316,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33317,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33318,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33319,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33320,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33321,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33322,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33323,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33324,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33325,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33328,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33329,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33330,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33331,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33332,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33334,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33335,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33336,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33337,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33338,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33339,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33340,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33345,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33346,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33348,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33349,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33351,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33355,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33359,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33388,
               "lat":26.14,
               "lon":-80.13,
               "city":"PLANTATION",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33394,
               "lat":26.14,
               "lon":-80.13,
               "city":"FORT LAUDERDALE",
               "state":"FL",
               "distance":8.5
            },
            {
               "zipcode":33008,
               "lat":25.98,
               "lon":-80.14,
               "city":"HALLANDALE",
               "state":"FL",
               "distance":3.03
            },
            {
               "zipcode":33009,
               "lat":25.98,
               "lon":-80.14,
               "city":"HALLANDALE",
               "state":"FL",
               "distance":3.03
            },
            {
               "zipcode":33002,
               "lat":25.86,
               "lon":-80.29,
               "city":"HIALEAH",
               "state":"FL",
               "distance":13.69
            },
            {
               "zipcode":33010,
               "lat":25.86,
               "lon":-80.29,
               "city":"HIALEAH",
               "state":"FL",
               "distance":13.69
            },
            {
               "zipcode":33011,
               "lat":25.86,
               "lon":-80.29,
               "city":"HIALEAH",
               "state":"FL",
               "distance":13.69
            },
            {
               "zipcode":33012,
               "lat":25.86,
               "lon":-80.29,
               "city":"HIALEAH",
               "state":"FL",
               "distance":13.69
            },
            {
               "zipcode":33013,
               "lat":25.86,
               "lon":-80.29,
               "city":"HIALEAH",
               "state":"FL",
               "distance":13.69
            },
            {
               "zipcode":33014,
               "lat":25.86,
               "lon":-80.29,
               "city":"HIALEAH",
               "state":"FL",
               "distance":13.69
            },
            {
               "zipcode":33015,
               "lat":25.86,
               "lon":-80.29,
               "city":"HIALEAH",
               "state":"FL",
               "distance":13.69
            },
            {
               "zipcode":33016,
               "lat":25.86,
               "lon":-80.29,
               "city":"HIALEAH",
               "state":"FL",
               "distance":13.69
            },
            {
               "zipcode":33017,
               "lat":25.86,
               "lon":-80.29,
               "city":"HIALEAH",
               "state":"FL",
               "distance":13.69
            },
            {
               "zipcode":33018,
               "lat":25.86,
               "lon":-80.29,
               "city":"HIALEAH",
               "state":"FL",
               "distance":13.69
            },
            {
               "zipcode":33019,
               "lat":26.02,
               "lon":-80.16,
               "city":"HOLLYWOOD",
               "state":"FL",
               "distance":0
            },
            {
               "zipcode":33020,
               "lat":26.02,
               "lon":-80.16,
               "city":"HOLLYWOOD",
               "state":"FL",
               "distance":0
            },
            {
               "zipcode":33021,
               "lat":26.02,
               "lon":-80.16,
               "city":"HOLLYWOOD",
               "state":"FL",
               "distance":0
            },
            {
               "zipcode":33022,
               "lat":26.02,
               "lon":-80.16,
               "city":"HOLLYWOOD",
               "state":"FL",
               "distance":0
            },
            {
               "zipcode":33023,
               "lat":26.02,
               "lon":-80.16,
               "city":"HOLLYWOOD",
               "state":"FL",
               "distance":0
            },
            {
               "zipcode":33024,
               "lat":26.02,
               "lon":-80.16,
               "city":"HOLLYWOOD",
               "state":"FL",
               "distance":0
            },
            {
               "zipcode":33025,
               "lat":26.02,
               "lon":-80.16,
               "city":"HOLLYWOOD",
               "state":"FL",
               "distance":0
            },
            {
               "zipcode":33026,
               "lat":26.02,
               "lon":-80.16,
               "city":"HOLLYWOOD",
               "state":"FL",
               "distance":0
            },
            {
               "zipcode":33027,
               "lat":26.02,
               "lon":-80.16,
               "city":"HOLLYWOOD",
               "state":"FL",
               "distance":0
            },
            {
               "zipcode":33028,
               "lat":26,
               "lon":-80.34,
               "city":"PEMBROKE PINES",
               "state":"FL",
               "distance":11.26
            },
            {
               "zipcode":33029,
               "lat":26.02,
               "lon":-80.16,
               "city":"HOLLYWOOD",
               "state":"FL",
               "distance":0
            },
            {
               "zipcode":33081,
               "lat":26.02,
               "lon":-80.16,
               "city":"HOLLYWOOD",
               "state":"FL",
               "distance":0
            },
            {
               "zipcode":33083,
               "lat":26.02,
               "lon":-80.16,
               "city":"HOLLYWOOD",
               "state":"FL",
               "distance":0
            },
            {
               "zipcode":33084,
               "lat":26,
               "lon":-80.34,
               "city":"HOLLYWOOD",
               "state":"FL",
               "distance":11.26
            },
            {
               "zipcode":33106,
               "lat":25.84,
               "lon":-80.22,
               "city":"MIAMI",
               "state":"FL",
               "distance":12.98
            },
            {
               "zipcode":33222,
               "lat":25.93,
               "lon":-80.23,
               "city":"MIAMI",
               "state":"FL",
               "distance":7.59
            },
            {
               "zipcode":33054,
               "lat":25.93,
               "lon":-80.26,
               "city":"OPA LOCKA",
               "state":"FL",
               "distance":8.79
            },
            {
               "zipcode":33055,
               "lat":25.93,
               "lon":-80.26,
               "city":"OPA LOCKA",
               "state":"FL",
               "distance":8.79
            },
            {
               "zipcode":33056,
               "lat":25.93,
               "lon":-80.26,
               "city":"MIAMI GARDENS",
               "state":"FL",
               "distance":8.79
            },
            {
               "zipcode":33060,
               "lat":26.23,
               "lon":-80.13,
               "city":"POMPANO BEACH",
               "state":"FL",
               "distance":14.63
            },
            {
               "zipcode":33061,
               "lat":26.23,
               "lon":-80.13,
               "city":"POMPANO BEACH",
               "state":"FL",
               "distance":14.63
            },
            {
               "zipcode":33062,
               "lat":26.23,
               "lon":-80.13,
               "city":"POMPANO BEACH",
               "state":"FL",
               "distance":14.63
            },
            {
               "zipcode":33063,
               "lat":26.23,
               "lon":-80.13,
               "city":"POMPANO BEACH",
               "state":"FL",
               "distance":14.63
            },
            {
               "zipcode":33064,
               "lat":26.23,
               "lon":-80.13,
               "city":"POMPANO BEACH",
               "state":"FL",
               "distance":14.63
            },
            {
               "zipcode":33065,
               "lat":26.23,
               "lon":-80.13,
               "city":"POMPANO BEACH",
               "state":"FL",
               "distance":14.63
            },
            {
               "zipcode":33066,
               "lat":26.23,
               "lon":-80.13,
               "city":"POMPANO BEACH",
               "state":"FL",
               "distance":14.63
            },
            {
               "zipcode":33067,
               "lat":26.23,
               "lon":-80.13,
               "city":"POMPANO BEACH",
               "state":"FL",
               "distance":14.63
            },
            {
               "zipcode":33068,
               "lat":26.23,
               "lon":-80.13,
               "city":"POMPANO BEACH",
               "state":"FL",
               "distance":14.63
            },
            {
               "zipcode":33069,
               "lat":26.23,
               "lon":-80.13,
               "city":"POMPANO BEACH",
               "state":"FL",
               "distance":14.63
            },
            {
               "zipcode":33071,
               "lat":26.23,
               "lon":-80.13,
               "city":"POMPANO BEACH",
               "state":"FL",
               "distance":14.63
            },
            {
               "zipcode":33072,
               "lat":26.23,
               "lon":-80.13,
               "city":"POMPANO BEACH",
               "state":"FL",
               "distance":14.63
            },
            {
               "zipcode":33073,
               "lat":26.23,
               "lon":-80.13,
               "city":"POMPANO BEACH",
               "state":"FL",
               "distance":14.63
            },
            {
               "zipcode":33074,
               "lat":26.23,
               "lon":-80.13,
               "city":"POMPANO BEACH",
               "state":"FL",
               "distance":14.63
            },
            {
               "zipcode":33075,
               "lat":26.23,
               "lon":-80.13,
               "city":"CORAL SPRINGS",
               "state":"FL",
               "distance":14.63
            },
            {
               "zipcode":33076,
               "lat":26.23,
               "lon":-80.13,
               "city":"POMPANO BEACH",
               "state":"FL",
               "distance":14.63
            },
            {
               "zipcode":33077,
               "lat":26.23,
               "lon":-80.13,
               "city":"POMPANO BEACH",
               "state":"FL",
               "distance":14.63
            },
            {
               "zipcode":33093,
               "lat":26.23,
               "lon":-80.13,
               "city":"MARGATE",
               "state":"FL",
               "distance":14.63
            },
            {
               "zipcode":33097,
               "lat":26.23,
               "lon":-80.13,
               "city":"COCONUT CREEK",
               "state":"FL",
               "distance":14.63
            },
            {
               "zipcode":33082,
               "lat":26,
               "lon":-80.34,
               "city":"PEMBROKE PINES",
               "state":"FL",
               "distance":11.26
            },
            {
               "zipcode":33110,
               "lat":25.85,
               "lon":-80.2,
               "city":"MIAMI",
               "state":"FL",
               "distance":12.01
            }
         ]
      }
   ]
}</pre>

        <h3>Get Nearby Zip Codes</h3>
        <p>To get zip codes that are within a certain radius, you can use the following.</p>
        <p><code>{{ url('near') }}/{zip_code}/{distance}?api_key={your_api_key}</code></p>
        <p><strong>Optional:</strong> <code>&details=true</code></p>

        <h5 class="text-muted">Examples</h5>
        <h4>Get list of zipcodes within 15 miles of 33024</h4>
        <p><strong>GET</strong> <code>{{ url('near') }}/33024/15?api_key=WEkohYHA7OkS8R5RhM3N.ca</code></p>
        <pre class="pre-scrollable">{
   "data":[
      33004,
      33008,
      33009,
      33019,
      33020,
      33021,
      33022,
      33023,
      33024,
      33025,
      33026,
      33027,
      33029,
      33081,
      33083
   ]
}
</pre>
        <h4>Get detailed list of zipcodes within 15 miles of 33024</h4>
        <p><strong>GET</strong> <code>{{ url('near') }}/33024/15?api_key=WEkohYHA7OkS8R5RhM3N.ca&details=true</code></p>
        <pre class="pre-scrollable">{
   "data":[
      {
         "zipcode":33004,
         "lat":26.05,
         "lon":-80.14,
         "city":"DANIA",
         "state":"FL",
         "distance":2.42
      },
      {
         "zipcode":33008,
         "lat":25.98,
         "lon":-80.14,
         "city":"HALLANDALE",
         "state":"FL",
         "distance":3.03
      },
      {
         "zipcode":33009,
         "lat":25.98,
         "lon":-80.14,
         "city":"HALLANDALE",
         "state":"FL",
         "distance":3.03
      },
      {
         "zipcode":33019,
         "lat":26.02,
         "lon":-80.16,
         "city":"HOLLYWOOD",
         "state":"FL",
         "distance":0
      },
      {
         "zipcode":33020,
         "lat":26.02,
         "lon":-80.16,
         "city":"HOLLYWOOD",
         "state":"FL",
         "distance":0
      },
      {
         "zipcode":33021,
         "lat":26.02,
         "lon":-80.16,
         "city":"HOLLYWOOD",
         "state":"FL",
         "distance":0
      },
      {
         "zipcode":33022,
         "lat":26.02,
         "lon":-80.16,
         "city":"HOLLYWOOD",
         "state":"FL",
         "distance":0
      },
      {
         "zipcode":33023,
         "lat":26.02,
         "lon":-80.16,
         "city":"HOLLYWOOD",
         "state":"FL",
         "distance":0
      },
      {
         "zipcode":33024,
         "lat":26.02,
         "lon":-80.16,
         "city":"HOLLYWOOD",
         "state":"FL",
         "distance":0
      },
      {
         "zipcode":33025,
         "lat":26.02,
         "lon":-80.16,
         "city":"HOLLYWOOD",
         "state":"FL",
         "distance":0
      },
      {
         "zipcode":33026,
         "lat":26.02,
         "lon":-80.16,
         "city":"HOLLYWOOD",
         "state":"FL",
         "distance":0
      },
      {
         "zipcode":33027,
         "lat":26.02,
         "lon":-80.16,
         "city":"HOLLYWOOD",
         "state":"FL",
         "distance":0
      },
      {
         "zipcode":33029,
         "lat":26.02,
         "lon":-80.16,
         "city":"HOLLYWOOD",
         "state":"FL",
         "distance":0
      },
      {
         "zipcode":33081,
         "lat":26.02,
         "lon":-80.16,
         "city":"HOLLYWOOD",
         "state":"FL",
         "distance":0
      },
      {
         "zipcode":33083,
         "lat":26.02,
         "lon":-80.16,
         "city":"HOLLYWOOD",
         "state":"FL",
         "distance":0
      }
   ]
}</pre>

        <h3>Find Zip Codes for City, ST</h3>
        <p>For when you want to find all related zip codes for a city.</p>
        <p><code>{{ url('find') }}/{location}?api_key={your_api_key}</code></p>

        <h4>Example</h4>
        <p><strong>GET</strong> <code>{{ url('find') }}/Hollywood, FL?api_key=WEkohYHA7OkS8R5RhM3N.ca</code></p>
            <pre class="pre-scrollable">{
  "data": [
    {
      "zipcode": 33019,
      "lat": 26.02,
      "lon": -80.16,
      "city": "HOLLYWOOD",
      "state": "FL"
    },
    {
      "zipcode": 33020,
      "lat": 26.02,
      "lon": -80.16,
      "city": "HOLLYWOOD",
      "state": "FL"
    },
    {
      "zipcode": 33021,
      "lat": 26.02,
      "lon": -80.16,
      "city": "HOLLYWOOD",
      "state": "FL"
    },
    {
      "zipcode": 33022,
      "lat": 26.02,
      "lon": -80.16,
      "city": "HOLLYWOOD",
      "state": "FL"
    },
    {
      "zipcode": 33023,
      "lat": 26.02,
      "lon": -80.16,
      "city": "HOLLYWOOD",
      "state": "FL"
    },
    {
      "zipcode": 33024,
      "lat": 26.02,
      "lon": -80.16,
      "city": "HOLLYWOOD",
      "state": "FL"
    },
    {
      "zipcode": 33025,
      "lat": 26.02,
      "lon": -80.16,
      "city": "HOLLYWOOD",
      "state": "FL"
    },
    {
      "zipcode": 33026,
      "lat": 26.02,
      "lon": -80.16,
      "city": "HOLLYWOOD",
      "state": "FL"
    },
    {
      "zipcode": 33027,
      "lat": 26.02,
      "lon": -80.16,
      "city": "HOLLYWOOD",
      "state": "FL"
    },
    {
      "zipcode": 33029,
      "lat": 26.02,
      "lon": -80.16,
      "city": "HOLLYWOOD",
      "state": "FL"
    },
    {
      "zipcode": 33081,
      "lat": 26.02,
      "lon": -80.16,
      "city": "HOLLYWOOD",
      "state": "FL"
    },
    {
      "zipcode": 33083,
      "lat": 26.02,
      "lon": -80.16,
      "city": "HOLLYWOOD",
      "state": "FL"
    },
    {
      "zipcode": 33084,
      "lat": 26,
      "lon": -80.34,
      "city": "HOLLYWOOD",
      "state": "FL"
    }
  ]
}</pre>
    </div>
</div>

@stop