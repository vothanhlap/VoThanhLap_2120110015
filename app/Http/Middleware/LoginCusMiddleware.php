<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
class LoginCusMiddleware
{
    private $cus;
    public function __construct(){

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next , $guard = 'cus'): Response
    {
        if(Auth::guard($guard)->check()){
            return $next($request);
        }
       return redirect()->route('frontend.home');
           
    }
}
