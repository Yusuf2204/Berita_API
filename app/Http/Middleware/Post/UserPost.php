<?php

namespace App\Http\Middleware\Post;

use Closure;
use App\Models\Posts\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPost
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
        $currentUser = Auth::user();
        $post = Posts::findOrFail($request->id);

        if($post->postUserId != $currentUser->userId) {
            return response()->json([
                "message" => "unauthorized",
                "code"    => 401
            ], 401);
        };
        return $next($request);
    }
}
