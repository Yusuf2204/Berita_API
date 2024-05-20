<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [App\Http\Controllers\Auth\AuthController::class, 'index']);

// protected api route
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', [App\Http\Controllers\Auth\AuthController::class, 'profile']);
    Route::get('/logout', [App\Http\Controllers\Auth\AuthController::class, 'logout']);

    Route::post('/posts', [App\Http\Controllers\Posts\PostsController::class, 'store']);
    Route::patch('/posts/{id}', [App\Http\Controllers\Posts\PostsController::class, 'update'])->middleware('user-post');
    Route::delete('/posts/{id}', [App\Http\Controllers\Posts\PostsController::class, 'destroy'])->middleware('user-post');
});

Route::get('/posts', [App\Http\Controllers\Posts\PostsController::class, 'index']);
Route::get('/posts/{id}', [App\Http\Controllers\Posts\PostsController::class, 'show']);


