<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;

class ExampleTest extends TestCase
{
    /**
     * DatabaseTransactions ：在測試其間對資料庫的所有操作會在測試完成後被滾回
     * DatabaseMigrations: 建立需要的資料表
     */
    use DatabaseMigrations, DatabaseTransactions;

    public function testSignInWithRandomUser()
    {
        // 在 users 資料表中建立一個使用者並回傳 User model
        $user = factory(App\User::class)->make();

        // 假定該使用者已經登入
        $this->be($user);

        // 驗證登入狀態
        $this->assertTrue(Auth::check());
    }
}
