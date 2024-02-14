<?php

namespace App\Http\Controllers\article;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use Exception;
use Illuminate\Support\Str;

class postsController extends Controller
{
    /**
     * 公開された記事一覧を取得して表示する
     * @access public
     * @return Illuminate\Http\JsonResponse
     * @throws Exception データベースクエリの実行中にエラーが発生した場合
     */
    public function getPublishedArticle()
    {
        try {
            $articles = Article::where('public_status', 1)->latest('created_at')->paginate(12);

            return response()->json([
                'articles' => $articles
            ], 200);
        } catch (Exception) {
            return response()->json([
                'message' => 'サーバ内でエラーが発生しました。'
            ], 500);
        }
    }

    /**
     * 指定された記事(slug)データを取得する
     * @access public
     * @param String $slug
     * @return Json
     * @throws Exception データベースクエリの実行中にエラーが発生した場合
     */
    public function getArticle(string $slug)
    {
        try {
            $article = Article::where('slug', $slug)->first();

            if (!$article) {
                return response()->json([
                    'message' => '記事が見つかりません。',
                ], 404);
            }

            $tags = $article->tags()->get();

            // 記事が非公開の場合は403エラーを返す
            if ($article->public_status === 0) {
                return response()->json([
                    'message' => 'この記事は非公開です。',
                ], 403);
            }

            return response()->json([
                'article' => $article,
                'tags' => $tags,
            ], 200);
        } catch (Exception) {
            return response()->json([
                'message' => 'サーバー内でエラーが発生しました。',
            ], 500);
        }
    }

    /**
     * 投稿された記事を取得して表示する
     * @access public
     * @return Json
     * @throws Exception データベースクエリの実行中にエラーが発生した場合
     */
    public function getAllArticle()
    {
        $articles = Article::latest('created_at')->paginate(12);

        return response()->json([
            'message' => '記事を取得しました。',
            'articles' => $articles
        ], 200);
    }

    /**
     * 指定された記事(blog_id)を削除する
     * @access public
     * @param Int $articleId
     * @return Illuminate\Contracts\View\View
     * @throws Exception データベースクエリの実行中にエラーが発生した場合
     */
    public function removeArticle(Int $articleId)
    {
        $article = Article::find($articleId);

        if (!$article) {
            return response()->json([
                'message' => '記事が見つかりませんでした。'
            ], 500);
        }

        if ($article->delete()) {
            return response()->json([
                'message' => '記事の削除に成功しました。'
            ], 200);
        } else {
            return response()->json([
                'message' => '記事の削除に失敗しました。'
            ], 500);
        }
    }

    /**
     * 記事投稿フォームから送信されたデータを保存する
     * @access public
     * @param Illuminate\Http\Request $request
     * @return Json
     * @throws Exception データベースクエリの実行中にエラーが発生した場合
     */
    public function submitArticle(Request $request)
    {
        // 画像投稿処理
        $image = $request->file('featuredImage');
        $imageName = time() . '-' . $image->getClientOriginalName();
        $image->move(storage_path('app/public/featured_image'), $imageName);

        $article = new Article();
        $article->admin_id = $request->input('adminId');
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->featured_image = $imageName;
        $article->meta_description = $request->input('metaDescription');
        $article->public_status = $request->input('publicStatus');
        $article->slug = Str::slug($request->input('title'));;
        $article->meta_title = $request->input('title');

        if ($article->save()) {
            return response()->json([
                'message' => '記事の投稿に成功しました。'
            ], 200);
        } else {
            return response()->json([
                'message' => '投稿の投稿に失敗しました。'
            ], 500);
        }
    }

    /**
     * 記事編集フォームを表示する
     * @access public
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Contracts\View\View
     * @throws Exception データベースクエリの実行中にエラーが発生した場合
     */
    public function getEditingArticle(Int $articleId)
    {
        $article = Article::find($articleId);

        if (!$article) {
            return response()->json([
                'message' => '記事が見つからない。'
            ], 500);
        }

        return response()->json([
            'article' => $article
        ], 200);
    }

    /**
     * 記事を更新する
     * @access public
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Contracts\View\View
     * @throws Exception データベースクエリの実行中にエラーが発生した場合
     */
    public function updateArticle(Request $request, Int $articleId)
    {
        // 画像投稿処理
        $image = $request->file('featuredImage');
        $imageName = time() . '-' . $image->getClientOriginalName();
        $image->move(storage_path('app/public/featured_image'), $imageName);

        $article = Article::find($articleId);
        $article->admin_id = $request->input('adminId');
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->featured_image = $imageName;
        $article->meta_description = $request->input('metaDescription');
        $article->public_status = $request->input('publicStatus');
        $article->slug = Str::slug($request->input('title'));
        $article->meta_title = $request->input('title');

        if ($article->update()) {
            return response()->json([
                'message' => '記事の更新に成功しました。'
            ], 200);
        } else {
            return response()->json([
                'message' => '投稿の更新に失敗しました。'
            ], 500);
        }
    }
}
