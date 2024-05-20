<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostsResource;
use App\Http\Resources\PostsDetailResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Posts\Posts;

class PostsController extends Controller
{
    public function __construct() {
        $this->model = new Posts();
    }

    public function index()
    {
        $posts = $this->model::with('writer:userId,userName')->get();

        $data = array(
            'data' => $posts
        );

        return PostsDetailResource::collection($posts);
    }

    public function show($id)
    {
        $post = $this->model->with('writer:userId,userName')->findOrFail($id);

        $data_id = new PostsDetailResource($post);
        return $data_id;
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'postTitle' => 'required|max:255',
            'postNews' => 'required',
        ]);

        $request['postUserId'] = Auth::user()->userId;

        $post = $this->model::create($request->all());
        $data_post = new PostsDetailResource($post->loadMissing('writer:userId,userName'));
        return $data_post;
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'postTitle' => 'required|max:255',
            'postNews' => 'required',
        ]);

        $post = $this->model::findOrFail($id);
        $post->update($request->all());

        $data_post = new PostsDetailResource($post->loadMissing('writer:userId,userName'));
        return $data_post;
    }

    public function destroy($id)
    {
        $post = $this->model::findOrFail($id);
        $post->delete($id);

        $data_post = new PostsDetailResource($post->loadMissing('writer:userId,userName'));
        return $data_post;
    }
}
