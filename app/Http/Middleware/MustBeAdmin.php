<?php

namespace App\Http\Middleware;

use Closure;

class MustBeAdmin
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
        
        $user = $request->user();


        if($user->hasRole('admin') || $user->hasRole('super-admin') ){
            return $next($request);
        }

        return redirect('home/access-denied');
        
    }
}
