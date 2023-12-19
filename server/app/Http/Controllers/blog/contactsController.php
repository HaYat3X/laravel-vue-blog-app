<?php

namespace App\Http\Controllers\blog;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Exception;
use Illuminate\Http\Request;

class contactsController extends Controller
{
    /**
     * お問い合わせフォームを表示する
     * @access public
     * @return Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('blog.contacts.create');
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
            $contact = new Contact();
            $contact->name = $request->input('name');
            $contact->email = $request->input('email');
            $contact->category = $request->input('category');
            $contact->content = $request->input('content');

            if ($contact->save()) {
                return redirect()->route('blogPostIndex')->with('notice', 'お問い合わせありがとうございます。メッセージを送信しました。近日中に改めてご連絡いたします。');
            } else {
                return redirect()->back()->with('alert', 'お問い合わせに失敗しました。もう一度お試しください。');
            }
        } catch (Exception) {
            return redirect()->back()->with('alert', 'お問い合わせに失敗しました。もう一度お試しください。');
        }
    }
}
