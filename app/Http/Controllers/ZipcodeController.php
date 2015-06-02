<?php namespace App\Http\Controllers;

use App\Zipcode;

class ZipcodeController extends Controller {


    public function getNearby(){
        $zip = Zipcode::where('zipcode', '=', 33024)->first();
        dd($zip->getNearbyZipcodes(6));
    }
}
