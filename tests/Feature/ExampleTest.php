<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
//誤った入力ではログインできない
    public function testInvalidUserLogin()
{
    $email = 'test-' . uniqid() . '@example.com';
    $user = User::factory()->create([
        'email' => $email,
        'password' => bcrypt('password123'),
    ]);

    $response = $this->post('/login', [
        'email' => 'incorrect@com',
        'password' => 'incorrectpassword',
    ]);

    $response->assertStatus(302); // リダイレクトされたかどうかのチェック
    // $response->assertRedirect('/login'); // リダイレクト先のパスを確認
    $this->assertGuest(); // ゲストとして認証されているかどうかのチェック
}

//ログインできるかどうかの確認
    public function testUserLogin()
{
    $email = 'test-' . uniqid() . '@example.com';
    //都度違ったアドレスを作成できる

    $user = User::factory()->create([
        'email' => $email,
        'password' => bcrypt('password123'),
    ]);

    $response = $this->post('/login', [
        'email' => $email,
        'password' => 'password123',
    ]);

    $response->assertStatus(302); // リダイレクトされたかどうかのチェック
    $response->assertRedirect('/home');

     // リダイレクト後のページのコンテンツを取得し、テキストの存在を確認する
    $responseAfterRedirect = $this->get('/home');
    $responseAfterRedirect->assertSee('You are logged in!'); 
    $this->assertAuthenticatedAs($user); // ログイン済みかどうかのチェック
}


}
