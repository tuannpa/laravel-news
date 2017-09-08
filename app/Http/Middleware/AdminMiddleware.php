<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        if(Auth::check())
        {
            if(Auth::user()->quyen == 1)
                return $next($request);
            else
                return redirect('admin/login')->with('message','Tài khoản này không được phép truy cập!');
        }
        else
            return redirect('admin/login')->with('message','Bạn chưa đăng nhập!'); 
    }
    // Nhớ phải khai báo Middleware mới tạo trong Kernel
}
