<?php

namespace App\Http\Middleware\Comment;

use Closure;
use Illuminate\Http\Request;
use App\Models\Comment\Comment;
use Illuminate\Support\Facades\Auth;

class UserComment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        $comment = Comment::findOrFail($request->id);

        if ($comment->commentUserId != $user->userId) {
            return response()->json(["message" => "data not found"], 404);
        }

        return $next($request);
    }
}
