<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::bind('zipcode', function($value)
{
    return App\Zipcode::where('zipcode', $value)->first();
});

Route::get('/near/{zipcode}/{distance}', ['middleware' => 'rate_limit', 'uses' => 'ZipcodeController@getNearby']);
Route::get('/get/{zipcode}', ['middleware' => 'rate_limit', 'uses' => 'ZipcodeController@get']);
Route::get('/find/{city}', ['middleware' => 'rate_limit', 'uses' => 'ZipcodeController@find']);

Route::get('/', 'HomeController@index');
Route::get('user', ['middleware' => 'auth', 'uses' => 'HomeController@userDetails']);

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);