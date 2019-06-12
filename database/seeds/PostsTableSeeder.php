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
                ['UserId' => 8,
                'title' => 'T',
                'content' => 'N',
                'level' => 1,
                'nextId' => 2
                ],
                ['UserId' => 4,
                'title' => 'T',
                'content' => 'N',
                'level' => 1,
                'nextId' => 4,
                ],
                ['UserId' => 5,
                'title' => 'T',
                'content' => 'N',
                'level' => 2,
                'nextId' => 4,
                'toId' => 1
                ],
                ['UserId' => 9,
                'title' => 'T',
                'content' => 'N',
                'level' => 1,
                'nextId' => 5,
                ],
                ];

        // 登録
        foreach($Post as $post) {
        \App\Post::create($post);
        }
    }
}
