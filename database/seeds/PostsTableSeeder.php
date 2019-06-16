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
                ['UserId' => 1,
                'title' => 'root',
                'content' => 'root',
                'level' => 1,
                'nextId' => 2
                ],
                ['UserId' => 2,
                'title' => 'two',
                'content' => 'two',
                'level' => 1,
                'nextId' => 4,
                ],
                ['UserId' => 3,
                'title' => 'three',
                'content' => 'three',
                'level' => 2,
                'toId' => 1
                ],
                ['UserId' => 4,
                'title' => 'four',
                'content' => 'four',
                'level' => 1,
                'nextId' => 3,
                ],
                ];

        // 登録
        foreach($Post as $post) {
        \App\Post::create($post);
        }
    }
}
