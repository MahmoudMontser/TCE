<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Student
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'student')
    {
        if (!Auth::guard($guard)->check()) {

            Auth::guard($guard)->logout();
            $request->session()->put('error', "ليس من صلاحياتك الدخول لتلك الصفحة");
            return redirect('student/login');

        }
        return $next($request);
    }
}
