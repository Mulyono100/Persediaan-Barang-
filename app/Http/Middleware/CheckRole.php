<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $status_id)
    {
        if ($request->User()->status_id == $status_id) {
            return $next($request);
        }
        return redirect('/login');
    }
}
