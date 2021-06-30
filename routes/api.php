<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// posts routes
Route::get('posts', [PostController::class, 'index']);
Route::post('posts', [PostController::class, 'store']);
Route::get('posts/{id}', [PostController::class, 'show']);
Route::put('posts/{id}', [PostController::class, 'update']);
Route::delete('posts/{id}', [PostController::class, 'destroy']);
Route::get('all-posts-with-comments', [PostController::class, 'allPostsWithComments']);
Route::get('single-post-with-comments/{id}', [PostController::class, 'singlePostWithComment']);


// comments routes
Route::get('comments', [CommentController::class, 'index']);
Route::post('posts/{postId}/comment', [CommentController::class, 'store']);
Route::get('comments/{id}', [CommentController::class, 'show']);
Route::put('posts/{postId}/comment/{id}', [CommentController::class, 'update']);
Route::delete('comments/{id}', [CommentController::class, 'destroy']);
Route::get('all-comments-with-posts', [CommentController::class, 'allCommentsWithPosts']);
Route::get('single-comment-with-post/{id}', [CommentController::class, 'singleCommentWithPost']);
