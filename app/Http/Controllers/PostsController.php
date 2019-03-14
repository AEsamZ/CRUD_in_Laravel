<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostsController extends Controller
{
    public function index(){
        return view('posts.index',[
            'posts'=>Post::paginate(4)
        ]);
    }

    public function create(){
        $users=User::all();
        return view('posts.create',[
            'users'=>$users,
        ]);
    }

    public function store(StorePostRequest $request){
        Post::create(request()->all());      
        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {   $post=Post::Findorfail($post);
        return view('posts.edit' , [
            'post' => $post,
        ]); 
    }    

    public function show(Post $post){
        return view('posts.show',[
            'post'=>$post,
        ]);
    }

    public function update(UpdatePostRequest $request,$post)
    {        
        $post = Post::Findorfail($post);
        $post->title=$request->title;
        $post->description=$request->description;
        $post->slug=$request->slug;
        $post->save();
        return redirect()->route("posts.index");
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route("posts.index");
    }

    
}
