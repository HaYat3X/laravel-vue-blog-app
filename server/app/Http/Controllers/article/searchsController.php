<?php

namespace App\Http\Controllers\article;

use App\Http\Controllers\Controller;
use App\Models\Article;

class searchsController extends Controller
{
    /**
     * 指定されたキーワードで記事を検索し、検索結果を取得する
     * @access public
     * @param Illuminate\Http\Request $keyword
     * @return Illuminate\Http\JsonResponse
     */
    public function show($keyword)
    {
        $articles = Article::query()->where('public_status', 1)->where(function ($query) use ($keyword) {
            $query->where('title', 'like', '%' . $keyword . '%')->orWhere('content', 'like', '%' . $keyword . '%');
        })->paginate(12);

        return response()->json([
            'articles' => $articles
        ], 200);
    }
}
