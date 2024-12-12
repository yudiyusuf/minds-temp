<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class WhichHome
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user() && (Auth::user()->role == 'USER'))
            return $next($request);
        elseif(Auth::user() && (Auth::user()->role == 'TECHNICIAN'))
            return redirect('/t');
        elseif(Auth::user() && (Auth::user()->role == 'MANAGER'))
            return redirect('/m');
        elseif(Auth::user() && (Auth::user()->role == 'ADMIN'))
            return redirect('/a');
        return response('Unauthorized. <a href="javascript:history.back()">Go Back</a>', 401);
    }
}
