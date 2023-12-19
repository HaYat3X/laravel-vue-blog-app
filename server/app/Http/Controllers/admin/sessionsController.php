<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class sessionsController extends Controller
{
    /**
     * ログインフォームを表示する
     * @access public
     * @return Illuminate\Contracts\View\View
     */
    public function create()
    {
        // 既にログインしている場合はダッシュボードにリダイレクト
        if (session('user')) {
            return redirect()->route('adminSessionCreate')->with('notice', '既にログインしています。');
        }

        return view('admin.sessions.create');
    }

    /**
     * お問い合わせフォームから送信されたデータをcontactsテーブルに保存する
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

            // ユーザーが存在し、パスワードが一致する場合
            if ($user && Hash::check($password, $user->password)) {
                session(['user' => $user]);
                return redirect()->route('adminBlogIndex');
            } else {
                return redirect()->back()->with('alert', 'ログインに失敗しました。');
            }
        } catch (Exception) {
            return redirect()->back()->with('alert', 'ログインに失敗しました。もう一度お試しください。');
        }
    }

    /**
     * ログイン時に発行したセッションを破棄する
     * @access public
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Contracts\View\View
     */
    public function destroy(Request $request)
    {
        $request->session()->forget('user');

        // ユーザがログインしているか確認
        if (session('user')) {
            return redirect()->route('adminSessionCreate')->with('notice', 'ログアウトしました。');
        } else {
            return redirect()->route('adminSessionCreate')->with('alert', '既にログアウトしています。');
        }
    }
}
