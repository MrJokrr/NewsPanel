<?php

namespace App\Http\Controllers;

use App\Models\Post;
use http\Env\Request;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     * @return \Illuminate\Http\Response
     */
    public function postView(Post $post)
    {
        return view('post', ['post'=>$post]);
    }

}
