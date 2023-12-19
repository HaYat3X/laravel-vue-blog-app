<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Config;

class CheckIP
{
    public function handle($request, Closure $next)
    {
        // 許可するIPアドレスを指定
        $allowedIP = env('ALLOWED_IP');

        // リクエスト元のIPアドレスを取得
        $requestIP = $request->ip();

        // 許可されたIP以外の場合はエラーページを表示
        if ($requestIP !== $allowedIP) {
            abort(403);
        }

        return $next($request);
    }
}
