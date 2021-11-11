<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginate = 6;
        $posts = Post::orderBy('created_at', 'DESC')->where('Active', true)->paginate($paginate);

        return view('welcome', [
            'posts' => $posts
        ]);
    }

    /**
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
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
