<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index(Post $post)
    {
        return view('post', ['post'=>$post]);
    }
    public function View(Request $request)
    {
        $post = new Post();
        $post->name=$request->title;
        $post->image=$request->image;
        $post->text=$request->text;
        return view('post', ['post'=>$post]);
    }
}
