<?php

namespace App\Http\Controllers\article;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class posts_controller extends Controller
{
    /**
     * 投稿された記事を取得して表示する
     * @access public
     * @return Json
     * @throws Exception データベースクエリの実行中にエラーが発生した場合
     */
    public function index_all()
    {
        try {
            $articles = Article::latest()->get();
            return response()->json([
                'messafe' => '記事を取得しました。',
                'articles' => $articles
            ], 200);
        } catch (Exception) {
            return response()->json([
                'message' => '記事の取得に失敗しました。'
            ], 500);
        }
    }
}
