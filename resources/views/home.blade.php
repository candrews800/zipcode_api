@extends('app')

@section('content')

    <div class="jumbotron">
        <h1>Zipcode API</h1>
        <p class="lead">Get quick information about zipcodes such as latitude, longitude, city and state. Find nearby zip codes. Free use up to 5,000 requests/day.</p>
        <p>
            <a class="btn btn-lg btn-success" href="{{ url('auth/register') }}" role="button">Sign Up</a>
            <a class="btn btn-lg btn-info" href="{{ url('docs') }}" role="button">View Docs</a>
        </p>
    </div>

    <div class="row marketing">
        <div class="col-lg-12">
            <h4>Get Zipcode Info</h4>
        </div>
        <div class="col-lg-6">
            <form id="getZipcodeForm" class="row">
                <div class="col-xs-9">
                    <div class="form-group">
                        <label class="sr-only">Zipcode</label>
                        <input type="text" class="form-control" placeholder="Zipcode">
                    </div>
                </div>
                <div class="col-xs-3">
                    <button  type="submit" id="getZipcodeForm-submit" class="btn btn-default pull-right">Search</button>
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
                    <button  type="submit" id="getNearbyZipcodes-submit" class="btn btn-default pull-right">Search</button>
                </div>


            </form>
        </div>

        <div class="col-lg-6">
            <pre id="listNearbyZipcodes" class="pre-scrollable">Enter a zipcode and distance...</pre>
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
                    <button  type="submit" id="findZipcodes-submit" class="btn btn-default pull-right">Search</button>
                </div>
            </form>
        </div>

        <div class="col-lg-6">
            <pre id="listZipcodes" class="pre-scrollable">Search for zipcodes by location...</pre>
        </div>

        <div class="col-lg-12">
            <h4>Get Distance</h4>
        </div>
        <div class="col-lg-6">
            <form id="getDistance" class="row">
                <div class="col-xs-4">
                    <div class="form-group">
                        <label class="sr-only">Zipcode</label>
                        <input name="zipcode1" type="text" class="form-control" placeholder="Zipcode">
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="form-group">
                        <label class="sr-only">Zipcode</label>
                        <input name="zipcode2" type="text" class="form-control" placeholder="Zipcode">
                    </div>
                </div>
                <div class="col-xs-4">
                    <button type="submit" id="getDistance-submit" class="btn btn-default pull-right">Search</button>
                </div>
            </form>
        </div>

        <div class="col-lg-6">
            <pre id="listDistance" class="pre-scrollable">Enter two zipcodes to find distance...</pre>
        </div>
    </div>

@stop

@section('js')

    <script>
        var apiKey = '?api_key={{ env('SITE_API_KEY') }}';
        $('#getZipcodeForm input[type="text"]').on('input', function(){
            var zipcode = $(this).val();

            if(zipcode.length == 5){
                getZipcodeDetails(zipcode, 0);
            }

            if(zipcode.length > 5){
                $(this).val(zipcode.substr(0,5));
            }
        });

        $('#getZipcodeForm').submit(function(event){
            event.preventDefault();
            var zipcode = $('#getZipcodeForm input[type="text"]').val();

            getZipcodeDetails(zipcode, 0);

            return false;
        });

        function getZipcodeDetails(zipcode, distance){
            var url = '{{ url('get') }}/' + zipcode + apiKey;
            if(distance > 0){
                url += '&embed=near:'+distance;
            }

            $.getJSON(url, function(data){
                $('#getZipcodeDetails').text(JSON.stringify(data, null, 2));
            }).fail(function(data) {
                $('#getZipcodeDetails').text(JSON.stringify(data['responseJSON'], null, 2));
            });
        }

        $('#getNearbyZipcodes').submit(function(event){

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

            return false;
        });

        function getNearbyZipcodes(zipcode, distance){
            var url = '{{ url('near') }}/' + zipcode + '/' + distance + apiKey;

            $.getJSON(url, function(data){
                $('#listNearbyZipcodes').text(JSON.stringify(data, null, 2));
            }).fail(function(data) {
                $('#listNearbyZipcodes').text(JSON.stringify(data['responseJSON'], null, 2));
            });
        }

        $('#findZipcodes').submit(function(event){
            event.preventDefault();

            var location = $('#findZipcodes input[type="text"]').val();

            getZipcodesByLocation(location);

            return false;
        });

        function getZipcodesByLocation(location){
            var url = '{{ url('find') }}/' + location + apiKey;

            $.getJSON(url, function(data){
                $('#listZipcodes').text(JSON.stringify(data, null, 2));
            }).fail(function(data) {
                $('#listZipcodes').text(JSON.stringify(data['responseJSON'], null, 2));
            });
        }

        $('#getDistance').submit(function(event){
            event.preventDefault();

            var zipcode1 = $('#getDistance [name="zipcode1"]').val();
            var zipcode2 = $('#getDistance [name="zipcode2"]').val();

            getDistance(zipcode1, zipcode2);

            return false;
        });

        function getDistance(zipcode1, zipcode2){
            var url = '{{ url('distance') }}/' + zipcode1 + '/' + zipcode2 + apiKey;

            $.getJSON(url, function(data){
                $('#listDistance').text(JSON.stringify(data, null, 2));
            }).fail(function(data) {
                $('#listDistance').text(JSON.stringify(data['responseJSON'], null, 2));
            });
        }
    </script>
@stop