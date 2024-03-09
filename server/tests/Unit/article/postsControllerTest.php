<?php

namespace Tests\Unit\article;

// use PHPUnit\Framework\TestCase;
use App\Models\Article;
use Tests\TestCase;
use App\Models\Admin;

class postsControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    // public function test_index(): void
    // {
    //     // ユーザーをで作成
    //     $user = new Admin();
    //     $user->name = 'Hayate Takeda';
    //     $user->email = 'hayatetakeda48@gmail.com';
    //     $user->password = bcrypt('Hayate88');
    //     $user->save();

    //     // ログインしてユーザーでアクセス
    //     $this->actingAs($user);

    //     // ここからはログインしたユーザーとしてテストを実行できます

    //     // // テスト用の記事データを作成
    //     // $articles = [];

    //     // for ($i = 0; $i < 5; $i++) {
    //     //     $article = new Article();
    //     //     $article->admin_id = 1;
    //     //     $article->title = 'title';
    //     //     $article->content = 'content';
    //     //     $article->featured_image = 'img.png';
    //     //     $article->meta_description = 'metaDescription';
    //     //     $article->public_status = 'publicStatus';
    //     //     $article->slug = 'slug';
    //     //     $article->meta_title = 'metaTitle';
    //     // }

    //     $response = $this->get('/api/v1/article/post');

    //     // ステータスコードが正しいことを確認
    //     $response->assertStatus(200);
    // }
}
