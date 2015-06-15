<?php namespace App\Http\Middleware;

use Closure;
use App\ResponseConstructor;

class RateLimit {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{

        if($request->input('api_key', null) == null){
            return response()->json(ResponseConstructor::noKey(), 403);
        }

        $key = $request->input('api_key');

        if(\App\ApiKey::where('api_key', $key)->count() == 0){
            return response()->json(ResponseConstructor::invalidKey(), 403);
        }


        $api_key = \App\ApiKey::where('api_key', $key)->first();
        $api_key->setRateLimiter(new \App\RedisRateLimiter($api_key->api_key));

        if( ! $api_key->rate_limiter->isValidRequest()){
            return response()->json(ResponseConstructor::tooManyAttempts(), 429);
        }

        $api_key->rate_limiter->doRequest();

		return $next($request);
	}
}
