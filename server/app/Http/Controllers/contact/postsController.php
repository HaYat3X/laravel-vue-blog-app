<?php

namespace App\Http\Controllers\contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class postsController extends Controller
{
    /**
     * お問い合わせされたデータの一覧を取得する
     * @access public
     * @return Json
     * @throws Exception データベースクエリの実行中にエラーが発生した場合
     */
    public function getAllContact()
    {
        $contacts = Contact::latest('created_at')->paginate(12);

        return response()->json([
            'contacts' => $contacts
        ], 200);
    }

    /**
     * 対応が完了したお問い合わせを削除する
     * @access public
     * @return Json
     * @throws Exception データベースクエリの実行中にエラーが発生した場合
     */
    public function removeContact(Int $contact_id)
    {
        $contact = Contact::find($contact_id);

        if (!$contact) {
            return response()->json([
                'message' => 'お問い合わせが見つかりませんでした。'
            ], 500);
        }

        if ($contact->delete()) {
            return response()->json([
                'message' => 'お問いあわせの削除に成功しました。'
            ], 200);
        } else {
            return response()->json([
                'message' => 'お問い合わせの削除に失敗しました。'
            ], 500);
        }
    }

    /**
     * お問い合わせされたデータを保存する
     * @access public
     * @param Illuminate\Http\Request $request
     * @return Json
     * @throws Exception データベースクエリの実行中にエラーが発生した場合
     */
    public function submitContact(Request $request)
    {
        try {
            $contact = new Contact();
            $contact->name = $request->input('name');
            $contact->email = $request->input('email');
            $contact->category = $request->input('category');
            $contact->content = $request->input('content');

            if ($contact->save()) {
                return response()->json([
                    'message' => 'お問い合わせが完了しました。'
                ], 200);
            } else {
                return response()->json([
                    'message' => 'お問い合わせに失敗しました。'
                ], 500);
            }
        } catch (Exception) {
            return response()->json([
                'message' => 'サーバー内でエラーが発生しました。'
            ], 500);
        }
    }
}
