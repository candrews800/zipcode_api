<?php namespace App;

abstract class RateLimiter{
    protected $max_requests = [
        'second' => 3,
        'minute' => 40,
        'hour' => 250
    ];
    protected $api_key;

    public function __construct($api_key){
        $this->api_key = $api_key;
    }

    abstract public function isValidRequest();

    abstract public function doRequest();
}