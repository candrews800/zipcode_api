<?php namespace App;

use \Illuminate\Support\Facades\Redis;

class RedisRateLimiter extends RateLimiter{

    /**
     * doRequest
     * New requests will increment each of the period types counters by 1
     * ie seconds += 1, minutes += 1, ..
     *
     * @return void
     */
    public function doRequest(){
        foreach($this->max_requests as $period=>$period_amount){
            if( ! Redis::exists($this->api_key.':'.$period)){
                Redis::set($this->api_key.':'.$period, '0');
                $this->setExpire($period);
            }
            $this->incrPeriod($period);
        }
    }

    /**
     * setExpire: set period to expire
     *
     * @param $period i.e.: 'second', 'minute', 'hour'
     *
     * @return void
     */
    private function setExpire($period){
        switch($period){
            case 'second':
                Redis::expire($this->getKeyName($period), '1');
                break;
            case 'minute':
                Redis::expire($this->getKeyName($period), '60');
                break;
            case 'hour':
                Redis::expire($this->getKeyName($period), '3600');
                break;
        }
    }

    /**
     * Increment Period
     *
     * @param  $period = 'second', 'minute', 'hour'
     *
     * @return bool
     */
    public function incrPeriod($period){
        return Redis::incr($this->getKeyName($period));
    }

    /**
     * Check if max requests has been met
     *
     * @param $api_key
     * @param  $type = 'second', 'minute', 'hour'
     *
     * @return bool
     */
    public function isValidRequest(){
        foreach($this->max_requests as $period=>$period_amount){
            if(Redis::exists($this->getKeyName($period)) && Redis::get($this->getKeyName($period)) > $period_amount){
                return false;
            }
        }
        return true;
    }

    /**
     * get key name structure
     *
     * @param  $period = 'second', 'minute', 'hour'
     *
     * @return string
     */
    public function getKeyName($period){
        return $this->api_key.':'.$period;
    }
}