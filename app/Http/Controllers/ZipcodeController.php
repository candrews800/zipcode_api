<?php namespace App\Http\Controllers;

use App\Zipcode;

class ZipcodeController extends Controller {
    public function getNearby(Zipcode $zip, $distance){
        return $zip->getNearbyZipcodes($distance);
    }

    public function get(Zipcode $zip){
        return $zip;
    }

    public function find($city){
        $zips = Zipcode::where('city', 'LIKE', '%'.$city.'%')->take(25)->get();

        return $zips;
    }
}
