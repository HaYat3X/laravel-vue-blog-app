<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class sessionsController extends Controller
{
    /**
     * ユーザ認証する
     * @access public
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Contracts\View\View
     * @throws Exception データベースクエリの実行中にエラーが発生した場合
     */
    public function store(Request $request)
    {
        try {
            $email = $request->input('email');
            $password = $request->input('password');
            $user = Admin::where('email', $email)->first();

            if ($user && Hash::check($password, $user->password)) {
                $token = $user->createToken('AccessToken')->plainTextToken;

                return response()->json([
                    'token' => $token,
                    'notice' => 'ログインに成功しました。'
                ], 200);
            } else {
                return response()->json([
                    'alert' => 'ログインに失敗しました。'
                ], 401);
            }
        } catch (Exception) {
            return response()->json([
                'alert' => 'サーバー内でエラーが発生しました。'
            ], 500);
        }
    }

}
