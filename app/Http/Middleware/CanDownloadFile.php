<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CanDownloadFile
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

        $toekn = $request->input('token');
        if ($toekn == "123456") {
            return abort(401);
        }

        return $next($request);
    }
}
