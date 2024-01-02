<?php

namespace App\Http\Controllers\article;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use Exception;
use Illuminate\Support\Str;

class posts_controller extends Controller
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

    /**
     * 記事投稿フォームから送信されたデータをblogsテーブルに保存する
     * @access public
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Contracts\View\View
     * @throws Exception データベースクエリの実行中にエラーが発生した場合
     */
    public function store(Request $request)
    {
        try {
            $image = $request->file('featuredImage');
            $imageName = time() . '-' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/featured_image'), $imageName);

            $blog = new Article();
            $blog->admin_id = $request->input('adminId');
            $blog->title = $request->input('title');
            $blog->content = $request->input('content');
            $blog->featured_image = $imageName;
            $blog->meta_description = $request->input('metaDescription');
            $blog->public_status = $request->input('publicStatus');

            $blog->slug = Str::slug($request->input('title'));;
            $blog->meta_title = $request->input('title');

            if ($blog->save()) {
                return response()->json([
                    'message' => '投稿成功'
                ], 200);
            } else {
                return response()->json([
                    'message' => '投稿失敗'
                ], 409);
            }
        } catch (Exception) {
            return response()->json([
                'message' => Exception
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
    public function edit(Request $request)
    {
        try {
            $article = Article::where('id', $request->article_id)->first();

            if (!$article) {
                return response()->json([
                    'message' => '記事が見つからない。'
                ], 404);
            }

            return response()->json([
                'article' => $article
            ], 200);
        } catch (Exception) {
            return response()->json([
                'message' => 'サーバ内でエラーが発生しました。'
            ], 500);
        }
    }

    /**
     * 記事投稿フォームから送信されたデータをblogsテーブルに保存する
     * @access public
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Contracts\View\View
     * @throws Exception データベースクエリの実行中にエラーが発生した場合
     */
    public function update(Request $request)
    {
        try {
            $image = $request->file('featuredImage');
            $imageName = time() . '-' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/featured_image'), $imageName);

            $blog = Article::where('id', 7)->first();
            $blog->admin_id = $request->input('adminId');
            $blog->title = $request->input('title');
            $blog->content = $request->input('content');
            $blog->featured_image = "aaa";
            $blog->meta_description = $request->input('metaDescription');
            $blog->public_status = $request->input('publicStatus');

            $blog->slug = Str::slug($request->input('title'));;
            $blog->meta_title = $request->input('title');

            if ($blog->update()) {
                return response()->json([
                    'message' => '投稿成功'
                ], 200);
            } else {
                return response()->json([
                    'message' => '投稿失敗'
                ], 409);
            }
        } catch (Exception) {
            return response()->json([
                'message' => Exception
            ], 500);
        }
    }
}
