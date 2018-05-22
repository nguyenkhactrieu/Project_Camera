<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class adminMidleware
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
        /*
        |
        |   ========== MIDDLEWARE ===========
        |   Kiểm tra đã đăng nhập chưa
        |   nếu đã đăng nhập thì cho tiếp tục
        |   chưa đăng nhập thì quay về trang đăng nhập
        |
         */
        if (Auth::check()) {
            return $next($request);
        }else{
            return redirect('admin');
        }

        
        
    }
}
