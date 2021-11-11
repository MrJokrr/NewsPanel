<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomePostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        $notFoundMassage = 'Post not found:)';

        foreach (Post::all() as $realPost)
            if($realPost->id == $post->id)
                return view('post', ['post' => $realPost]);

        return view('errorPage', ['message' => $notFoundMassage, 'description' => $post]);
//        echo $post;
        //return view('post', ['post' => $post]);
    }
}
