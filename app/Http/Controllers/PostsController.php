<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class PostsController extends Controller
{
    public function index(){
        return view('posts.index',[
            'posts'=>Post::all()
        ]);
    }

    public function create(){
        $users=User::all();
        return view('posts.create',[
            'users'=>$users,
        ]);
    }

    public function store(){
        Post::create(request()->all());
        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {        
        return view('posts.edit' , [
            'post' => $post,
        ]); 
    }    

    public function show(Post $post){
        return view('posts.show',[
            'post'=>$post,
        ]);
    }

    public function update($post)
    {
        $request= request();
        $post = Post::findorfail($post);
        $post->title=$request->title;
        $post->description=$request->description;
        $post->save();
        return redirect()->route("posts.index");
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route("posts.index");
    }

    
}
