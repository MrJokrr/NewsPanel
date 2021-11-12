<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeAdminController extends Controller
{
    public function index()
    {
        $posts_count = Post::all()->count();

        return view('admin.home.index', ['posts_count' => $posts_count]);
    }
}
