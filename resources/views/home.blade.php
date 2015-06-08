@extends('app')

@section('content')

    <div class="jumbotron">
        <h1>Zipcode API</h1>
        <p class="lead">Get quick information about zipcodes such as latitude, longitude, city and state. Find nearby zip codes. Free use up to 5,000 requests/day.</p>
        <p>
            <a class="btn btn-lg btn-success" href="{{ url('auth/register') }}" role="button">Sign up today</a>
            <a class="btn btn-lg btn-info" href="{{ url('docs') }}" role="button">View Docs</a>
        </p>
    </div>

    <div class="row marketing">
        <div class="col-lg-12">
            <h4>Get Zipcode Info</h4>
        </div>
        <div class="col-lg-6">
            <form id="getZipcodeForm" class="row">
                <div class="col-xs-6">
                    <div class="form-group">
                        <label class="sr-only">Zipcode</label>
                        <input type="text" class="form-control" placeholder="Zipcode">
                    </div>
                </div>
                <div class="col-xs-6">
                    <button type="submit" class="btn btn-default pull-right">Search</button>
                </div>
            </form>
        </div>
        <div class="col-lg-6">
            <pre id="getZipcodeDetails">Enter a zipcode...</pre>
        </div>

        <div class="col-lg-12">
            <h4>Get Nearby Zips</h4>
        </div>
        <div class="col-lg-6">
            <form id="getNearbyZipcodes" class="row">
                <div class="col-xs-6">
                    <div class="form-group">
                        <label class="sr-only">Zipcode</label>
                        <input type="text" id="nearby-zipcode" class="form-control" placeholder="Zipcode">
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="form-group">
                        <label class="sr-only">Distance</label>
                        <input type="text" id="nearby-distance" class="form-control" placeholder="Distance" value="25">
                    </div>
                </div>
                <div class="col-xs-3">
                    <button type="submit" class="btn btn-default pull-right">Search</button>
                </div>


            </form>
        </div>

        <div class="col-lg-6">
            <div id="listNearbyZipcodes" class="well">Enter a zipcode and distance to find nearby zips...</div>
        </div>

        <div class="col-lg-12">
            <h4>Find Zipcodes</h4>
        </div>
        <div class="col-lg-6">
            <form id="findZipcodes" class="row">
                <div class="col-xs-9">
                    <div class="form-group">
                        <label class="sr-only">City, ST</label>
                        <input type="text" class="form-control" placeholder="City, ST">
                    </div>
                </div>
                <div class="col-xs-3">
                    <button type="submit" class="btn btn-default pull-right">Search</button>
                </div>
            </form>
        </div>

        <div class="col-lg-6">
            <pre id="listZipcodes" class="pre-scrollable">Search for zipcodes by location...</pre>
        </div>
    </div>

@stop

@section('js')

    <script>
        var apiKey = '?api_key=$2y$10$mUkeWNJV8UvmmS49JzZUKuZwcin5wtWEkohYHA7OkS8R5RhM3N.ca';
        $('#getZipcodeForm input[type="text"]').on('input', function(){
            var zipcode = $(this).val();

            if(zipcode.length == 5){
                getZipcodeDetails(zipcode);
            }

            if(zipcode.length > 5){
                $(this).val(zipcode.substr(0,5));
            }
        });

        $('#getZipcodeForm').submit(function(event){
            event.preventDefault();
            var zipcode = $('#getZipcodeForm input[type="text"]').val();

            if(zipcode.length == 5){
                getZipcodeDetails(zipcode);
            }
        });

        function getZipcodeDetails(zipcode){
            var url = '{{ url('get') }}/' + zipcode + apiKey;

            $.getJSON(url, function(data){
                $('#getZipcodeDetails').text(JSON.stringify(data, null, 2));
            });
        }

        $('#getNearbyZipcodes').submit(function(event){
            event.preventDefault();

            var zipcode = $('#nearby-zipcode').val();
            var distance = $('#nearby-distance').val();

            if(zipcode.length == 5 && parseInt(distance) > 0){
                getNearbyZipcodes(zipcode, distance);
            }

            if(zipcode.length > 5){
                $('#nearby-zipcode').val(zipcode.substr(0,5));
            }

            if(parseInt(distance) > 500) {
                $('#nearby-distance').val(500);
            }
        });

        function getNearbyZipcodes(zipcode, distance){
            var url = '{{ url('near') }}/' + zipcode + '/' + distance + apiKey;

            $.getJSON(url, function(data){
                $('#listNearbyZipcodes').text(JSON.stringify(data, null, 2));
            });
        }

        $('#findZipcodes').submit(function(event){
            event.preventDefault();

            var location = $('#findZipcodes input[type="text"]').val();

            getZipcodesByLocation(location);
        });

        function getZipcodesByLocation(location){

            console.log(location);
            var url = '{{ url('find') }}/' + location + apiKey;

            console.log(url);

            $.getJSON(url, function(data){
                $('#listZipcodes').text(JSON.stringify(data, null, 2));
            });
        }
    </script>
@stop