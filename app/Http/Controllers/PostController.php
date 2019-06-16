<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

$count = 1;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // DBよりBookテーブルの値を全て取得
        $posts = Post::latest()->get();
        $postList = array();
        array_push($postList,$posts[0]);
        foreach($posts as $i =>$post){
            if(isset($post->nextId)){
                foreach($posts as $j =>$subpost){
                    if($post->nextId == $subpost->id){
                        array_push($postList,$subpost);
                    }
                }
            }
        }
        // foreach($posts as $post){
        //     if(!isset($post->toId)){
        //         array_push($postList,$post);
        //     }else{
        //         $target = $post->toId;
        //         foreach($posts as $post){
        //             if($post["id"]==$target){
        //                 array_push($postList,$post);
        //             }
        //         }
        //     }
        // }
  
        // 取得した値をビュー「book/index」に渡す
        return view('post/index', compact('postList'));
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
        $count = 0;
        $newPost = new Post;
        $newPost->title = "sample";
        $newPost->UserId = 1;
        $newPost->level = 0;
        $newPost->nextId = $count + 1;//借り入れ
        $newPost->content = $request->content;
        $newPost->save();
        $posts = Post::latest()->get();
        return view('post/index', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show', ['post' => $post]);
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
