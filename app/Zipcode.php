<?php

namespace App;

use \Illuminate\Database\Eloquent\Model;

class Zipcode extends Model{

    public $timestamps = false;

    public static function createFromCSV($row){
        $zip = new self;
        $zip->zipcode = $row[0];
        $zip->city = $row[1];
        $zip->state = $row[2];
        $zip->lat = $row[3];
        $zip->lon = $row[4];

        return $zip->save();
    }
}