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

Route::get('/near/{zipcode}/{distance}', 'ZipcodeController@getNearby');
Route::get('/get/{zipcode}', 'ZipcodeController@get');
Route::get('/find/{city}', 'ZipcodeController@find');

Route::get('/', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('create_api', function() {
    return App\User::find(1)->apiKey()->save(new App\ApiKey(array(
        'api_key' => 'test_api_key'
    )));
});