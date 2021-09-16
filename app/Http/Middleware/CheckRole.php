<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, String $role)
    {
        if ($role == 'market' && auth()->user()->type != 'market'){
            abort(403);
        }
        if ($role == 'company' && auth()->user()->type != 'company'){
            abort(403);
        }
        if ($role == 'sales' && auth()->user()->type != 'sales'){
            abort(403);
        }
        return $next($request);
    }
}
