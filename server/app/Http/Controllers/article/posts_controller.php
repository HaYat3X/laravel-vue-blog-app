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

     /**
     * 指定された記事(blog_id)を削除する
     * @access public
     * @param 
     * @return Illuminate\Contracts\View\View
     * @throws Exception データベースクエリの実行中にエラーが発生した場合
     */
    public function destroy(Request $request)
    {
        try {
            $article_id = $request->input('articleId');
            $article = Article::find($article_id);

            if (!$article) {
                return response()->json([
                    'message' => '記事が見つかりませんでした。'
                ], 404);
            }

            if ($article->delete()) {
                return response()->json([
                    'message' => '記事の削除に成功しました。'
                ], 200);
            } else {
                return response()->json([
                    'message' => '削除に失敗しました。'
                ], 409);
            }
        } catch (Exception) {
            return response()->json([
                'message' => 'サーバ内でエラーでエラーが発生しました。'
            ], 500);
        }
    }
}
