<?php

namespace Tests\Unit\auth;

use Tests\TestCase;
use App\Models\Admin;

class sessionsControllerTest extends TestCase
{
    /**
     * ログインできるか検証する
     */
    public function test_login(): void
    {
        // 準備
        $user = new Admin();
        $user->name = 'Hayate Takeda';
        $user->email = 'hayatetakeda48@gmail.com';
        $user->password = bcrypt('Hayate88');
        $user->save();

        // 実行
        $response = $this->post('/api/v1/session/login', [
            'email' => $user->email,
            'password' => 'Hayate88',
        ]);

        // 検証
        $response->assertStatus(200);
        $response->assertJson([
            'token' => true,
            'message' => true,
        ]);
    }

    /**
     * ログインしたユーザ情報を取得できるか検証する
     */
    public function test_user(): void
    {
        // 準備
        $user = new Admin();
        $user->name = 'Hayate Takeda';
        $user->email = 'hayatetakeda48@gmail.com';
        $user->password = bcrypt('Hayate88');
        $user->save();

        // 実行
        $token = $user->createToken('test-token')->plainTextToken;
        $this->withHeader('Authorization', 'Bearer ' . $token);

        // 検証
        $response = $this->get('/api/v1/session/user');
        $response->assertStatus(200);
        $response->assertJson([
            'admin' => true,
        ]);
    }
}
