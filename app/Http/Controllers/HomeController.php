<?php namespace App\Http\Controllers;

use \Illuminate\Support\Facades\Redis;
use \Illuminate\Support\Facades\Auth;


class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('home');
	}

    public function docs()
    {
        return view('docs');
    }

    public function userDetails()
    {
        $api_requests = [
            'second' => Redis::get(Auth::user()->apikey.':second'),
            'minute' => Redis::get(Auth::user()->apikey.':minute'),
            'hour' => Redis::get(Auth::user()->apikey.':hour')

        ];

        return view('userDetails')->with([
            'api_requests' => $api_requests
        ]);
    }

}
