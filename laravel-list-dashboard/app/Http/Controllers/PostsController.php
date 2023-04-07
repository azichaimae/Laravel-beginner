<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    public function __invoke()
    {
     return ("c'est la méthode par defaut");
    }
   public function index()
   {
    $post=Post::get();
    return view("posts.index", compact('post'));
   }
public function show(Post $post)
{
    //traitement de $post
    return view("posts.show", compact('post'));
}

public function create()
{
return view("posts.create");
}

public function store(Request $request)
{

//traitement d'ajout
    $validatedData = $request->validate([
        'title'=> 'required|max:255',
        'content'=>'required',
    ]);
    $post = new Post;
    $post->title=$validatedData['title'];
    $post->content=$validatedData['content'];
    $post->user_id = rand(1,10);
    $post->save();
    return redirect("/posts");
}

public function edit($id)
{
    $post = Post::find($id);
    return view("posts.edit",compact('post'));
}

public function update(Request $request,$id)
{
    $post = Post::find($id);
    $post->title=$request->input('title');
    $post->content=$request->input('content');
    $post->user_id = rand(1,10);
    $post->update();
    return redirect("/posts");
}


public function delete($id)
{
    $post = Post::find($id);
    $post->delete();
    return redirect("/posts");
}


}
