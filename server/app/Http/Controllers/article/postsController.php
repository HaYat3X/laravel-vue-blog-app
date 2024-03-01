<?php

namespace App\Http\Controllers\article;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Str;

class postsController extends Controller
{
    /**
     * 記事一覧を取得する
     * @access public
     * @return Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $articles = Article::latest('created_at')->paginate(12);

        return response()->json([
            'articles' => $articles
        ], 200);
    }

    /**
     * 公開された記事一覧を取得する
     * @access public
     * @return Illuminate\Http\JsonResponse
     */
    public function public()
    {
        $articles = Article::where('public_status', 1)->latest('created_at')->paginate(12);

        return response()->json([
            'articles' => $articles
        ], 200);
    }

    /**
     * 指定された記事を削除する
     * @access public
     * @param $articleId 削除する記事ID
     * @return Illuminate\Http\JsonResponse
     */
    public function destroy(Int $articleId)
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
     * 記事を投稿する
     * @access public
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $imageName = $this->saveToStorage($request);
        $articleData = new Article();
        $article = $this->createArticleParams($request, $imageName, $articleData);

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
     * 更新記事を取得
     * @access public
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\JsonResponse
     */
    public function edit($articleId)
    {
        $article = Article::find($articleId);

        if (!$article) {
            return response()->json([
                'message' => '記事が見つかりませんでした。'
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
     * @param $articleId 更新する記事ID
     * @return Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $articleId)
    {
        $articleData = Article::find($articleId);
        $imageName = $articleData->featured_image;
        $article = $this->createArticleParams($request, $imageName, $articleData);

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

    /**
     * 指定された記事を取得する
     * @access public
     * @param $slug 取得する記事のslug
     * @return Illuminate\Http\JsonResponse
     */
    public function show(string $slug)
    {
        $article = Article::where('slug', $slug)->first();

        if (!$article) {
            return response()->json([
                'message' => '記事が見つかりません。',
            ], 404);
        }

        // 記事が非公開の場合は403エラーを返す
        if ($article->public_status === 0) {
            return response()->json([
                'message' => 'この記事は非公開です。',
            ], 403);
        }

        return response()->json([
            'article' => $article,
        ], 200);
    }

    /**
     * ストレージにサムネイル画像を保存する
     * @access private
     * @param $request
     * @return $imageName
     */
    private function saveToStorage($request)
    {
        $image = $request->file('featuredImage');
        $imageName = time() . '-' . $image->getClientOriginalName();
        $image->move(storage_path('app/public/featured_image'), $imageName);

        return $imageName;
    }

    /**
     * 記事作成、更新時に使用するパラメータ
     * @access private
     * @param $request
     * @param $imageName
     * @param $articleData
     * @return $article
     */
    private function createArticleParams($request, $imageName, $articleData)
    {
        $article = $articleData;
        $article->admin_id = $request->input('adminId');
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->featured_image = $imageName;
        $article->meta_description = $request->input('metaDescription');
        $article->public_status = $request->input('publicStatus');
        $article->slug = $this->createSlug($request);
        $article->meta_title = $request->input('title');

        return $article;
    }

    /**
     * 記事のslugを生成し、重複をチェックする
     * @access private
     * @param $request
     * @return $slug 生成したslug
     */
    private function createSlug($request)
    {
        $slug = Str::slug($request->input('title'));

        // slugが空の場合はデフォルトのslugを返す
        if (empty($slug)) {
            return 'page';
        }

        // 重複をチェックして重複があれば適切な修正を行う
        $count = Article::where('slug', $slug)->count();

        if ($count > 0) {
            // 重複がある場合、数字を追加して一意のslugを生成する
            $suffix = 2;

            while (Article::where('slug', $slug)->exists()) {
                $slug = Str::slug($request->input('title')) . '-' . $suffix;
                $suffix++;
            }
        }

        return $slug;
    }
}
