<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
class VerifyPhoneMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {   
        if(auth()->user()->isVerified == false) {
            return redirect()->route('add-phone');
        }
        return $next($request);
    }
}
