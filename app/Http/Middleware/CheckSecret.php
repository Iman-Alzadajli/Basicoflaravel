<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSecret
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }


    public function handle($request, Closure $next)
{
    if ($request->input('secret') !== '12345') {
        return redirect('/no-access');
    }

    return $next($request);
}

}
