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

Route::get('/near/{zipcode}/{distance}', ['middleware' => 'rate_limit', 'uses' => 'ZipcodeController@getNearby']);
Route::get('/get/{zipcode}', ['middleware' => 'rate_limit', 'uses' => 'ZipcodeController@get']);
Route::get('/find/{city}', ['middleware' => 'rate_limit', 'uses' => 'ZipcodeController@search']);
Route::get('/distance/{zipcode1}/{zipcode2}', ['middleware' => 'rate_limit', 'uses' => 'ZipcodeController@calcDistance']);

Route::get('/', 'HomeController@index');
Route::get('user', ['middleware' => 'auth', 'uses' => 'HomeController@userDetails']);

Route::group(['prefix' => 'docs'], function () {
    Route::get('/', 'DocumentationController@gettingStarted');
    Route::get('/getting-started', 'DocumentationController@gettingStarted');
    Route::get('/how-to-use', 'DocumentationController@howToUse');
    Route::get('/endpoints', 'DocumentationController@endpoints');
    Route::get('/libraries', 'DocumentationController@libraries');
});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::post('pull_update', function(){
    $secret = env('GITHUB_PULL_SECRET');

    $headers = getallheaders();
    $hubSignature = $headers['X-Hub-Signature'];

    // Split signature into algorithm and hash
    list($algo, $hash) = explode('=', $hubSignature, 2);

    // Get payload
    $payload = file_get_contents('php://input');
    $payload = json_decode($payload);
    $payload = json_encode($payload);
    $payload = str_replace('\/', '/', $payload);


    // Calculate hash based on payload and the secret
    $payloadHash = hash_hmac($algo, $payload, $secret);

    if($hash === $payloadHash){
        // execute git pull
        return shell_exec("git pull");
    }
    return 'Wrong Hash';
});