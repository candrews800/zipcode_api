<?php namespace App;

use \Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Facades\DB;

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

    public function getNearbyZipcodes($distance){
        return self::nearby($this->lat, $this->lon, $distance)->distinct()->lists('zipcode');
    }

    public function scopeNearby($query, $lat, $lon, $distance){
        return $query->select(
            DB::raw('( 3959 * acos( cos( radians('.$lat.') ) * cos( radians( lat ) )
                                            * cos( radians(lon) - radians('.$lon.')) + sin(radians('.$lat.'))
                                            * sin( radians(lat)))) AS distance, zipcode '
            ))
            ->having('distance', '<', $distance);
    }
}