<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class CheckVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check())
       {
        if(Auth::user()->status==0){
            Auth::logout();
            return redirect()->intended('/dangnhap')->with('messchuaxacnhan','Tài Khoản Chưa Được Xác Nhận. <a style="color:red;"href="'.route('no_active').'">Nhấn vào để kích hoạt tài khoản </a>');
        }
    }
        return $next($request);
    }
}
