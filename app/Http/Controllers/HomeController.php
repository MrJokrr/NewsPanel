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
        $this->middleware('auth')->except('login');
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
        $postIDs = [];

        $posts = Post::orderBy('created_at', 'DESC');
        foreach ($posts as $postDB)
            $postIDs += $postDB['id'];

        $prev = "";
        $next = "";

        foreach ($posts as $postDB)
            if($postDB['id'] = $post['id']) {
                $prev = prev($postDB);
                next($postDB);
                $next = next($postDB);
            }

        $notFoundMassage = 'Post not found:)';

        foreach (Post::all() as $realPost)
            if($realPost->id == $post->id)
                return view('post', ['post' => $realPost, 'nextPost' => $next, 'prevPost' => $prev])->with('prevPost' , $prev);

        return view('errorPage', ['message' => $notFoundMassage, 'description' => $post]);
//        echo $post;
        //return view('post', ['post' => $post]);
    }


}
