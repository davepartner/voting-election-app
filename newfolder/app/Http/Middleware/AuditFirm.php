<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AuditFirm
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
        if(Auth::check() && Auth::user()->role_id == 3){ //if user is audit firm
            return $next($request);
        }

        return redirect('categories');
    }
}
