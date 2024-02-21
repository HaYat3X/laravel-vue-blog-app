<?php

namespace App\Http\Controllers\contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class postsController extends Controller
{
    /**
     * お問い合わせ一覧を取得する
     * @access public
     * @return Illuminate\Http\JsonResponse
     */
    public function getAllContact()
    {
        $contacts = Contact::latest('created_at')->paginate(12);

        return response()->json([
            'contacts' => $contacts
        ], 200);
    }

    /**
     * お問い合わせを削除する
     * @access public
     * @param $contactId 削除するお問い合わせID
     * @return Illuminate\Http\JsonResponse
     */
    public function removeContact($contactId)
    {
        $contact = Contact::find($contactId);

        if ($contact->delete()) {
            return response()->json([
                'message' => 'お問い合わせの削除に成功しました。'
            ], 200);
        } else {
            return response()->json([
                'message' => 'お問い合わせの削除に失敗しました。'
            ], 500);
        }
    }

    /**
     * お問い合わせを保存する
     * @access public
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\JsonResponse
     */
    public function submitContact(Request $request)
    {
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
    }
}
