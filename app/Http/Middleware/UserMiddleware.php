<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
//        dd($request->user()->authorize_level !== 1);
        if ( ($request->user()->id != $request->segments()[1]) && ($request->user()->authorize_level !== 1) ) {
            return redirect('/users/'.$request->user()->id);
        }
		return $next($request);
	}

}
