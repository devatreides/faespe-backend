<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureApiDomainIsValid
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
        return $next($request)
            ->header('Access-Control-Allow-Origin', env('ALLOWED_DOMAINS'))
            ->header('Access-COntrol-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
    }
}
