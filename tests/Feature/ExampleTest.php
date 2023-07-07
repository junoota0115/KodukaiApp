<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    protected function refreshDatabase()
    {
        $this->artisan('migrate');
    }
    //上記を入れることで、DB内のデータがリフレッシュされない。
    //ただし、テストコードで作成したデータも保持されたままになる

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

//ログイン後にindexページへ遷移するか確認
public function testButtonClick()
{
    /** @var \App\Models\User $user */
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/home');

    $response->assertStatus(200);

    // ボタンを押して遷移する
    $responseAfterClick = $this->actingAs($user)->get('/index'); // ボタンが送信するURLを指定

    // 遷移後のページで期待される動作や表示をアサーションする
    $responseAfterClick->assertStatus(200);
    $responseAfterClick->assertSee('小遣い');
    $responseAfterClick->assertSee('さんのページ');

    //入金ボタンを押すと登録フォームに遷移
    $responseAfterClick = $this->actingAs($user)->get('/create'); // ボタンが送信するURLを指定
    $responseAfterClick->assertStatus(200);
    $responseAfterClick->assertSee('登録フォーム');
    //ホームボタンを押すとindexページに遷移
    $responseAfterClick = $this->actingAs($user)->get('/index'); // ボタンが送信するURLを指定
    $responseAfterClick->assertStatus(200);
    $responseAfterClick->assertSee('さんのページ');
    //履歴ボタンを押すとdetailページに遷移
    $responseAfterClick = $this->actingAs($user)->get('/detail'); // ボタンが送信するURLを指定
    $responseAfterClick->assertStatus(200);
    $responseAfterClick->assertSee('履歴');
    
}


}
