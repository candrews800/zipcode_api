<?php namespace App\Http\Controllers;

use App\Zipcode;

class ZipcodeController extends Controller {
    public function getNearby(Zipcode $zip, $distance){
        return $zip->getNearbyZipcodes($distance);
    }

    public function get(Zipcode $zip){
        return $zip;
    }

    public function search($location){
        $zips = Zipcode::search($location);

        if(sizeof($zips)){
            return $zips;
        }

        return 'None found.';
    }
}
