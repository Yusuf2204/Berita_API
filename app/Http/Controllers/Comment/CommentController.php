<?php

namespace App\Http\Controllers\Comment;

use Illuminate\Http\Request;
use App\Models\Comment\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Comment\CommentResource;

class CommentController extends Controller
{
    public function __construct() {
        $this->model = new Comment();
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'commentPostId'     => 'required|exists:posts,postId',
            'commentContent'    => 'required'
        ]);

        $userId = Auth()->user()->userId;
        $request['commentUserId'] = $userId;

        $comment = $this->model::create($request->all());

        return new CommentResource($comment->loadMissing(['commentator:userId,userName']));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'commentContent'    => 'required'
        ]);

        $comment = $this->model->findOrFail($id);
        $comment->update($request->only('commentContent'));

        return new CommentResource($comment->loadMissing(['commentator:userId,userName']));
    }

    public function destroy($id)
    {
        $comment = $this->model->findOrFail($id);
        $comment->delete($id);

        return new CommentResource($comment->loadMissing(['commentator:userId,userName']));
}
}
