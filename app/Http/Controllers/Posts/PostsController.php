<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostsResource;
use App\Http\Resources\PostsDetailResource;
use Illuminate\Http\Request;
use App\Models\Posts\Posts;

class PostsController extends Controller
{
    public function __construct() {
        $this->model = new Posts();
    }

    public function index()
    {
        $posts = Posts::all();

        $data = array(
            'data' => $posts
        );

        return PostsResource::collection($posts);
    }

    public function show($id)
    {
        $post = $this->model->with('writer:userId,userName')->findOrFail($id);

        $data_id = new PostsDetailResource($post);
        return $data_id;
    }
}
