<?php

namespace App;

use \Illuminate\Database\Eloquent\Model;

class Zipcode extends Model{

    public $timestamps = false;
    protected $fillable = ['zipcode', 'city', 'state', 'lat', 'lon'];

    public static function createFromCSV($row){
        $fields = [
            'zipcode' => $row[0],
            'city' => $row[1],
            'state' => $row[2],
            'lat' => $row[3],
            'lon' => $row[4]
        ];

        return self::create($fields);
    }
}