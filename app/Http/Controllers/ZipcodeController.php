<?php namespace App\Http\Controllers;

use App\Zipcode;

class ZipcodeController extends Controller {
    public function getNearby($zip, $distance){
        $zipcode = Zipcode::get($zip);
        return $zipcode->getNearbyZipcodes($distance);
    }

    public function get($zip){
        $zips[] = $zip;
        if(strpos($zip, ',')){
            $zips = explode(',', $zip);

            $trim = function($val){
                return trim($val);
            };

            $zips = array_map($trim, $zips);
        }
        return Zipcode::whereIn('zipcode', $zips)->get();
    }

    public function search($location){
        $zips = Zipcode::search($location);

        if(sizeof($zips)){
            return $zips;
        }

        return 'None found.';
    }
}
