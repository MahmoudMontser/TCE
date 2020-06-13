<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ISAdmin
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
        if(!Auth::check()){

                Auth::logout();
                $request->session()->put('error', "ليس من صلاحياتك الدخول لتلك الصفحة");
                return redirect('admin/login');

        }
        return $next($request);
    }
}
