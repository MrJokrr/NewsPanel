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
}
