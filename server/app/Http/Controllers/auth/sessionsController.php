<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class sessionsController extends Controller
{
    /**
     * ユーザ認証する
     * @access public
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\JsonResponse
     */
    public function signIn(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $user = Admin::where('email', $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            $token = $user->createToken('AccessToken')->plainTextToken;

            return response()->json([
                'token' => $token,
                'message' => 'ログインに成功しました。'
            ], 200);
        } else {
            return response()->json([
                'message' => 'ログインに失敗しました。'
            ], 500);
        }
    }

    /**
     * ログインした管理者情報を取得する
     * @access public
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\JsonResponse
     */
    public function isLogin(Request $request)
    {
        return response()->json([
            'admin' => $request->user()
        ]);
    }

    /**
     * ログアウトする
     * @access public
     * @return Illuminate\Http\JsonResponse
     */
    public function signOut()
    {
        if (DB::table('personal_access_tokens')->truncate()) {
            return response()->json([
                'message' => 'ログアウトしました。'
            ], 200);
        } else {
            return response()->json([
                'message' => 'ログアウトに失敗しました。'
            ], 500);
        }
    }
}
