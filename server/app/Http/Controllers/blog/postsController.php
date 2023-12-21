<?php

namespace App\Http\Controllers\blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Tag;
use Illuminate\Mail\Markdown;

class postsController extends Controller
{
    /**
     * 公開されているブログ記事を取得してJSON形式でデータを返却する
     * @access public
     * @return JSON
     * @throws Exception データベースクエリの実行中にエラーが発生した場合
     */
    public function index()
    {
        try {
            // $blogs = Blog::where('public_status', 1)->latest('created_at')->paginate(20);
            $blogs = Blog::where('public_status', 1)->latest('created_at')->get();
            // $tags = Tag::all();
            // // return view('blog/posts.list', compact('blogs', 'tags'));
            // //loginが成功するとtokenと共に情報をjson形式で返却。
            return response()->json([
                'blogs' => $blogs,
            ], 200);
        } catch (Exception) {
            return response()->json([
                'message', 'エラーが発生しました。'
            ], 500);
        }
    }

    /**
     * 公開されているブログ記事と登録されているタグ一覧を取得して表示する
     * @access public
     * @return Illuminate\Contracts\View\View
     * @throws Exception データベースクエリの実行中にエラーが発生した場合
     */
    public function list()
    {
        try {
            $blogs = Blog::where('public_status', 1)->latest('created_at')->paginate(20);
            $tags = Tag::all();
            return view('blog/posts.list', compact('blogs', 'tags'));
        } catch (Exception) {
            abort(500, 'エラーが発生しました。');
        }
    }

    /**
     * 指定された記事(slug)と登録されているタグ一覧を取得して表示する
     * @access public
     * @param String $slug
     * @return Illuminate\Contracts\View\View
     * @throws Exception データベースクエリの実行中にエラーが発生した場合
     */
    public function show(string $slug)
    {
        try {
            $blog = Blog::where('slug', $slug)->first();
            $tags = Tag::all();

            // 記事が見つからない場合は404エラーを返す
            if (!$blog) {
                return response()->json([
                    'message' => '記事が見つかりません。',
                ], 404);
            }

            // 記事が非公開の場合は403エラーを返す
            if ($blog->public_status === 0) {
                // abort(403, 'この記事は非公開です。');
                return response()->json([
                    'message' => 'この記事は非公開です。',
                ], 403);
            }

            return response()->json([
                'blog' => $blog,
            ], 200);

            // // MarkdownをHTMLに変換
            // $htmlContent = Markdown::parse(e($blog->content));

            // return view('blog.posts.show', compact('blog', 'htmlContent', 'tags'));
        } catch (Exception) {
            abort(500, 'エラーが発生しました。');
        }
    }
}
