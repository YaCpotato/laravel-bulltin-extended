<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postList = Post::where('level', 1)->orderBy('id')->get();
        $childList = Post::where('level', 2)->orderBy('id')->get();
        return view('post/index', compact('postList','childList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newPost = new Post;
        $newPost->title = "sample";
        $newPost->UserId = Auth::user()->id;
        if(isset($request->id)){
            $newPost->level = 2;
            $newPost->nextId = null;
        }else{
            $newPost->level = 1;
            $newPost->nextId = Post::max('id') +2;
        }
        $newPost->toId = $request->id;
        $newPost->content = $request->content;
        $newPost->save();
        $postList = Post::where('level', 1)->orderBy('id')->get();
        $childList = Post::where('level', 2)->orderBy('id')->get();
        return view('post/index', compact('postList','childList'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,Post $post)
    {
        $type = $request->type;
        return view('post.show', ['post' => $post,'type'=> $type]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->content = $request->content;
        $post->save();

        return redirect("/post");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect("/post");
    }
}
