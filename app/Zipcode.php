<?php namespace App;

use \Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Facades\DB;

class Zipcode extends Model{

    public $timestamps = false;
    protected $fillable = ['zipcode', 'city', 'state', 'lat', 'lon'];
    protected $hidden = ['id'];

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

    public function getNearbyZipcodes($distance = null, $details = false){
        if($distance > 100){
            $distance = 100;
        }
        if($distance == null){
            $distance = 15;
        }
        if($details){
            return self::nearby($this->lat, $this->lon, $distance)->distinct()->get();
        }
        return self::nearby($this->lat, $this->lon, $distance)->distinct()->lists('zipcode');
    }

    public function scopeNearby($query, $lat, $lon, $distance){
        return $query->select(
            DB::raw('*,
                     ROUND( 3959 * acos( cos( radians ('.$lat.') )
                            * cos( radians ( lat ) )
                            * cos( radians ( lon ) - radians ('.$lon.') )
                            + sin( radians ('.$lat.') )
                            * sin( radians ( lat ) ) ) , 2 ) AS distance'
            ))
            ->having('distance', '<', $distance);
    }

    public static function get($zipcode){
        return self::where('zipcode', $zipcode)->firstOrFail();
    }

    public static function search($location){
        $location_array = explode(',', $location);
        $city = trim($location_array[0]);

        if(strpos($location, ',')){
            $state = trim($location_array[1]);
        }

        if(isset($state)){
            $zips = self::where('city', 'LIKE', '%'.$city.'%')->where('state', 'LIKE', '%'.$state.'%')->take(25)->get();
        }
        else{
            $zips = self::where('city', 'LIKE', '%'.$city.'%')->take(25)->get();
        }

        return $zips;
    }

    public function embed($embed){
        $parameter = null;
        if(strpos($embed, ':')){
            $arr = explode(':', $embed);
            $embed = $arr[0];
            $parameter = $arr[1];
        }
        switch($embed){
            case 'near':
                return $this->embedNear($parameter);
                break;
            default:
                return $this;
            break;
        }
    }

    public function embedNear($distance = null){
        $this->near = $this->getNearbyZipcodes($distance);
        return $this;
    }
}