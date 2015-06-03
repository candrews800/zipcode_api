<?php namespace App\Http\Controllers;

use App\Zipcode;

class ZipcodeController extends Controller {
    public function getNearby(Zipcode $zip, $distance){
        return $zip->getNearbyZipcodes($distance);
    }

    public function get(Zipcode $zip){
        return $zip;
    }

    public function find($location){
        $location_array = explode(',', $location);
        $city = trim($location_array[0]);

        if(strpos($location, ',')){
            $state = trim($location_array[1]);
        }


        if(isset($state)){
            $zips = Zipcode::where('city', 'LIKE', '%'.$city.'%')->where('state', 'LIKE', '%'.$state.'%')->take(10)->get();
        }
        else{
            $zips = Zipcode::where('city', 'LIKE', '%'.$city.'%')->take(10)->get();
        }

        if(sizeof($zips)){
            return $zips;
        }

        return 'None found.';
    }
}
