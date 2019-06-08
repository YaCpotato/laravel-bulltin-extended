<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller
{
    public function index()
  {
      // DBよりBookテーブルの値を全て取得
      $posts = Post::all();

      // 取得した値をビュー「book/index」に渡す
      return view('post/index', compact('posts'));
  }
}
