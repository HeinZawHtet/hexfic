<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Routing\Middleware;
use App\Exceptions\ApiKeyMismatchException;

class VerifyApiKey implements Middleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( in_array($request->headers->get('X-Api-Key'), \Config::get('hexfic.api_key')))
		{
			return $next($request);
		}
		throw new ApiKeyMismatchException;
    }

}