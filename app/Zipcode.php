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
            'city' => ucwords(strtolower($row[1])),
            'state' => strtoupper($row[2]),
            'lat' => round($row[3],2),
            'lon' => round($row[4],2)
        ];

        return self::create($fields);
    }

    public function getLatAttribute($value){
        return round($value,2);
    }

    public function getLonAttribute($value){
        return round($value,2);
    }

    public static function distance($zipcode1, $zipcode2){
        $zipcode1 = self::get($zipcode1);
        $zipcode2 = self::get($zipcode2);

        if( ! $zipcode1 || ! $zipcode2){
            throw new \Exception('Error in finding Zip');
        }
        $distance = 3959 * acos( cos( deg2rad( $zipcode1->lat ) )
                                * cos( deg2rad( $zipcode2->lat ) )
                                * cos( deg2rad( $zipcode2->lon ) - deg2rad($zipcode1->lon) )
                                + sin( deg2rad( $zipcode1->lat ) )
                                * sin( deg2rad( $zipcode2->lat ) ) );

        return $distance;
    }

    public function getNearbyZipcodes($distance = 15, $details = false){
        if($distance > 100){
            $distance = 100;
        }

        $query = self::nearby($this->lat, $this->lon, $distance)->distinct();
        if($details){
            return $query->get();
        }
        return $query->lists('zipcode')->all();
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
        try{
            $zip = self::where('zipcode', $zipcode)->firstOrFail();
        } catch(\Exception $e){
            return 0;
        }
        return $zip;
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

    public function embedNear($distance = 15){
        $this->near = $this->getNearbyZipcodes($distance, true);
        return $this;
    }
}