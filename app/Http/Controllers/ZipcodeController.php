<?php namespace App\Http\Controllers;

use App\Zipcode;
use App\ResponseConstructor;

class ZipcodeController extends Controller {
    public function getNearby($zip, $distance){
        $zipcode = Zipcode::get($zip);
        $nearby = $zipcode->getNearbyZipcodes($distance);

        return response()->json(ResponseConstructor::success($nearby), 200);
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

        $zipcodes = Zipcode::whereIn('zipcode', $zips)->get();

        if(sizeof($zipcodes) < 1){
            return response()->json(ResponseConstructor::noneFound(), 404);
        }

        return response()->json(ResponseConstructor::success($zipcodes), 200);
    }

    public function search($location){
        $zips = Zipcode::search($location);

        if(sizeof($zips)){
            return response()->json(ResponseConstructor::success($zips), 200);
        }

        return 'None found.';
    }
}
