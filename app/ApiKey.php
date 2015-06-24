<?php namespace App;

use \Illuminate\Database\Eloquent\Model;

class ApiKey extends Model{
    public $table = 'api_keys';
    protected $fillable = ['api_key'];
    public $rate_limiter;

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function setRateLimiter(RateLimiter $limiter){
        $this->rate_limiter = $limiter;
    }

    public function __toString(){
        return strval($this->api_key);
    }


}