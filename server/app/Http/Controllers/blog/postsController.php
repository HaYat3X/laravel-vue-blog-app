<?php

namespace App\Http\Controllers\blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Tag;
use Illuminate\Mail\Markdown;

class postsController extends Controller
{
    /**
     * 公開されているブログ記事と登録されているタグ一覧を取得して表示する
     * @access public
     * @return Illuminate\Contracts\View\View
     * @throws Exception データベースクエリの実行中にエラーが発生した場合
     */
    public function index()
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
                abort(404, '記事が見つかりません。');
            }

            // 記事が非公開の場合は403エラーを返す
            if ($blog->public_status === 0) {
                abort(403, 'この記事は非公開です。');
            }

            // MarkdownをHTMLに変換
            $htmlContent = Markdown::parse(e($blog->content));

            return view('blog.posts.show', compact('blog', 'htmlContent', 'tags'));
        } catch (Exception) {
            abort(500, 'エラーが発生しました。');
        }
    }
}
