<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Custumer;
class LoginCusMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if(Auth::guard('cus')->check()){
        //     return redirect->route('login.dangnhap');
        // }elseif(Auth::guard('cus')->user()->status==0){
        //     Auth::guard('cus')->logout();
        //     return redirect->route('login.dangnhap')->with('message', ['type' => 'danger', 'msg' => 'Tài khoản của bạn chưa được kích hoạt!']);
        // }
           return $next($request);
    }
}
