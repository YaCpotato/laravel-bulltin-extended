<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $postList = Post::where('level', 1)->orderBy('id')->get();
        $childList = Post::where('level', 2)->orderBy('id')->get();
        return view('post/index', compact('postList','childList'));    }
}
