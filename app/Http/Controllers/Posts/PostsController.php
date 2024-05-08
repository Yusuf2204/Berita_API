<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts\Posts;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Posts::all();
        return response()->json($posts);
    }
}
