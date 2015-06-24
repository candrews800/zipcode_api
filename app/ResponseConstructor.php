<?php namespace App;

class ResponseConstructor{

    public static function success($data){
        return ['data' => $data];
    }

    public static function noneFound(){
        return self::error(100, 404, 'No records were found for the given parameters.');
    }

    public static function tooManyAttempts(){
        return self::error(429, 429, 'You\'ve reached your limit for the amount of requests allowed.');
    }

    public static function noKey(){
        return self::error(403, 4030, 'No Api Key was provided.');
    }

    public static function invalidKey(){
        return self::error(403, 4031, 'The key provided does not match any records.');
    }

    public static function error($code, $http_code, $message){
        return ['error' => [
            'code' => $code,
            'http_code' => $http_code,
            'message' => $message
        ]];
    }
}