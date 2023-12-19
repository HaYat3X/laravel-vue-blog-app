<?php

namespace App\Http\Controllers\blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Tag;

class searchsController extends Controller
{
    /**
     * 登録されているタグ一覧を取得して表示する
     * @access public
     * @return Illuminate\Contracts\View\View
     * @throws Exception データベースからタグ一覧を取得する際にエラーが発生した場合
     */
    public function index()
    {
        try {
            $tags = Tag::all();
            return view('blog.searchs.index', compact('tags'));
        } catch (Exception) {
            abort(500, 'Internal Server Error');
        }
    }

    /**
     * 登録されているタグ一覧を取得して表示する
     * @access public
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Contracts\View\View
     * @throws Exception データベースから検索結果を取得する際にエラーが発生した場合
     */
    public function show(Request $request)
    {
        try {
            $search_keyword = $request->input('k');
            $search_tag = $request->input('t');
            $query = Blog::query()->where('public_status', 1);

            if ($search_keyword) {
                $query->where('title', 'like', '%' . $search_keyword . '%') ->orWhere('content', 'like', '%' . $search_keyword . '%')->where('public_status', 1);
            }

            if ($search_tag) {
                $post_ids = Tag::where('tag', $search_tag)->pluck('blog_id')->toArray();
                $query->where('public_status', 1)->whereIn('id', $post_ids);
            }

            $blogs = $query->paginate(20);

            return view('blog.searchs.show', compact('blogs', 'search_keyword', 'search_tag'));
        } catch (Exception) {
            abort(500, 'Internal Server Error');
        }
    }
}
