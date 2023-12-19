<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLogin
{
    public function handle(Request $request, Closure $next)
    {
        if (session('user')) {
            return $next($request);
        } else {
            return redirect()->route('adminSessionCreate')->with('alert', 'ログインしてください。');
        }
    }
}
