<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->user_type == 1) {
            return $next($request); // Đúng là admin -> Cho phép đi tiếp
        }

        // Nếu là user bình thường -> Đuổi về trang chủ
        return redirect('/')->with('error', 'Bạn không có quyền truy cập trang này!');
    }
}
