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
        //$this->middleware('auth')->except('login');
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
    private function checker(Post $post)
    {
        $newText = $post['text'];

        foreach (Post::all() as $postDB)
        {
            $postTags = explode(', ', $postDB['tags']);

            foreach ($postTags as $tag)
            {
                //$tagWord = "<a href=\"\show".$postDB->id.">".$tag."</a>";
                $tagWord = '<a href="'. route('show', $postDB['id']) .' ">'.$tag.'</a>';
                $newText = str_replace($tag, $tagWord, $newText);
            }
        }
        return $newText;
    }

    private function makeLeftRight(Post $post)
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();

        $prev = "";
        $next = "";

        $found = false;

        foreach ($posts as $postDB) {
            $next = $postDB->id;

            if ($found)
                break;

            if ($post->id == $postDB->id)
                $found = true;

            if (!$found)
                $prev = $postDB['id'];
        }

        if ($prev == $post['id'])
            $prev = "";
        if ($next == $post['id'])
            $next = "";

        return [$prev, $next];
    }

    /**
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        foreach (Post::all() as $realPost)
            if($realPost->id == $post->id) {

                $newPost = $post;

                $BLR = $this->makeLeftRight($post);

                $newPost['text'] = $this->checker($newPost);

                //$newPost->text = str_replace('Pushka', urldecode('<a href=" route(\'show\', '.$post['id'].') ">Makushka</a>'), $newPost['text']);

                return view('post', ['post' => $newPost, 'nextPost' => $BLR[1], 'prevPost' => $BLR[0]]);
            }
        $notFoundMassage = 'Post not found:)';

        return view('errorPage', ['message' => $notFoundMassage, 'description' => $post['id']]);
    }


}
