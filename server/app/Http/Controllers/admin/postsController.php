<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Exception;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class postsController extends Controller
{
    /**
     * 投稿された記事を取得して表示する
     * @access public
     * @return Illuminate\Contracts\View\View
     * @throws Exception データベースクエリの実行中にエラーが発生した場合
     */
    public function index()
    {
        try {
            $blogs = Blog::latest()->get();
            return view('admin.posts.index', compact('blogs'));
        } catch (Exception) {
            abort(500);
        }
    }

    /**
     * 記事投稿フォームを表示する
     * @access public
     * @return Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.posts.create');
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
            $dir = 'featured_image';
            $file = $request->file('featured_image');
            $file_name = time() . '_' . $file->getClientOriginalName();
            $storage_path = "public/{$dir}/{$file_name}";
            Image::make($file)->orientate()->save(storage_path("app/{$storage_path}"));

            $blog = new Blog();
            $blog->title = $request->input('title');
            $blog->content = $request->input('content');
            $blog->featured_image = $file_name;
            $blog->meta_description = $request->input('meta_description');

            if ($request->input('public_status')) {
                $status = 1;
            } else {
                $status = 0;
            }

            $blog->public_status = $status;
            $blog->admin_id = session('user')->id;
            $blog->slug = Str::slug($request->input('title'));;
            $blog->meta_title = $request->input('title');

            if ($blog->save()) {
                return redirect()->route('adminBlogIndex')->with('notice', '記事の投稿に成功しました。');
            } else {
                return redirect()->back()->with('alert', '記事の投稿に失敗しました。');
            }
        } catch (Exception) {
            return redirect()->back()->with('alert', '記事の投稿に失敗しました。');
        }
    }

    /**
     * 記事編集フォームを表示する
     * @access public
     * @param Int $blog_id
     * @return Illuminate\Contracts\View\View
     * @throws Exception データベースクエリの実行中にエラーが発生した場合
     */
    public function edit(int $blog_id)
    {
        try {
            $blog = Blog::where('id', $blog_id)->first();

            if (!$blog) {
                abort(404);
            }

            return view('admin/posts.edit', compact('blog'));
        } catch (Exception) {
            abort(500);
        }
    }

    /**
     * 記事編集フォームから送信されたデータをblogsテーブルに保存する
     * @access public
     * @param Int $blog_id
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Contracts\View\View
     * @throws Exception データベースクエリの実行中にエラーが発生した場合
     */
    public function update(int $blog_id, Request $request)
    {
        try {
            $blog = Blog::where('id', $blog_id)->first();

            $dir = 'featured_image';
            $file = $request->file('featured_image');
            $file_name = time() . '_' . $file->getClientOriginalName();
            $storage_path = "public/{$dir}/{$file_name}";
            Image::make($file)->orientate()->save(storage_path("app/{$storage_path}"));

            $blog->title = $request->input('title');
            $blog->content = $request->input('content');
            $blog->featured_image = $file_name;
            $blog->meta_description = $request->input('meta_description');

            if ($request->input('public_status')) {
                $status = 1;
            } else {
                $status = 0;
            }

            $blog->public_status = $status;
            $blog->admin_id = session('user')->id;
            $blog->slug = Str::slug($request->input('title'));;
            $blog->meta_title = $request->input('title');

            if ($blog->save()) {
                return redirect()->route('adminBlogIndex')->with('notice', '記事の更新に成功しました。');
            } else {
                return redirect()->back()->with('alert', '記事の更新に失敗しました。');
            }
        } catch (Exception) {
            return redirect()->back()->with('alert', '記事の更新に失敗しました。');
        }
    }

    /**
     * 指定された記事(blog_id)を削除する
     * @access public
     * @param Int $blog_id
     * @return Illuminate\Contracts\View\View
     * @throws Exception データベースクエリの実行中にエラーが発生した場合
     */
    public function destroy(int $blog_id)
    {
        try {
            $blog = Blog::find($blog_id);

            if ($blog->delete()) {
                return redirect()->route('adminBlogIndex')->with('notice', '記事の削除に成功しました。');
            } else {
                return redirect()->back()->with('alert', '記事の削除に失敗しました。');
            }
        } catch (Exception) {
            return redirect()->back()->with('alert', '記事の削除に失敗しました。');
        }
    }
}
