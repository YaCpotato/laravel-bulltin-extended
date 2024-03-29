<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // テーブルのクリア
        DB::table('posts')->truncate();

        // 初期データ用意（列名をキーとする連想配列）
        $Post = [
                ['UserId' => 0,
                'title' => 'root',
                'content' => 'root',
                'level' => 0,
                'nextId' =>1,
                ],
                ];

        // 登録
        foreach($Post as $post) {
        \App\Post::create($post);
        }
    }
}
