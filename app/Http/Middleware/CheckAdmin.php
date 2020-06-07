<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
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
        $user=Auth::user();
        if(!$user->isAdmin()){
            return redirect()->route('customer.index.view')->with(["msg"=>'у вас нет прав доступа']);
        }

        return $next($request);
    }
}
