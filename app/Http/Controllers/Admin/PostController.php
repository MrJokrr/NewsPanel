<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();

        return view('admin.posts.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->name=$request->title;
        $post->image=$request->image;
        $post->text=$request->text;
        if($request->active == 'on')
            $post->active=TRUE;
        else
            $post->active=FALSE;
        $post->save();


        $posts = Post::orderBy('created_at', 'DESC')->get();

        return view('admin.posts.index', [
            'posts' => $posts
        ]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->name=$request->title;
        $post->image=$request->image;
        $post->text=$request->text;
        if($request->active == 'on')
            $post->active=TRUE;
        else
            $post->active=FALSE;

        $post->save();

        $posts = Post::orderBy('created_at', 'DESC')->get();

        return view('admin.posts.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        $posts = Post::orderBy('created_at', 'DESC')->get();

        return view('admin.posts.index', [
            'posts' => $posts
        ]);
    }
}
