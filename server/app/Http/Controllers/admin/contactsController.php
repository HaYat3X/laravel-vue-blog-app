<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Exception;

class contactsController extends Controller
{
    /**
     * お問い合わせ一覧を取得して表示する
     * @access public
     * @return Illuminate\Contracts\View\View
     * @throws Exception データベースクエリの実行中にエラーが発生した場合
     */
    public function index()
    {
        try {
            $contacts = Contact::latest()->get();
            return view('admin.contacts.index', compact('contacts'));
        } catch (Exception) {
            abort(500, 'エラーが発生しました。');
        }
    }

    /**
     * 指定されたお問い合わせ(content_id)を削除する
     * @access public
     * @param Int $content_id
     * @return Illuminate\Contracts\View\View
     * @throws Exception データベースクエリの実行中にエラーが発生した場合
     */
    public function destroy(int $contact_id)
    {
        try {
            $contact = Contact::find($contact_id);

            if (!$contact) {
                abort(404);
            }

            if ($contact->delete()) {
                return redirect()->route('adminContactIndex')->with('notice', 'お問い合わせの削除に成功しました。');
            } else {
                return redirect()->back()->with('alert', 'お問い合わせの削除に失敗しました。');
            }
        } catch (Exception) {
            return redirect()->back()->with('alert', 'お問い合わせの削除に失敗しました。');
        }
    }
}
