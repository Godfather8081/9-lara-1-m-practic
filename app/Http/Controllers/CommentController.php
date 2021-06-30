<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //

    public function index()
    {
        return Comment::all();
    }


    public function store(Request $req, $postID)
    {

        $post = Post::find($postID);
        $comment = new Comment();
        $comment->title = $req->title;
        $comment->likes = $req->likes;
        $post->comments()->save($comment);
    }

    public function show($id)
    {
        return Comment::find($id);
    }

    public function update(Request $req, $postId, $id)
    {
        $post = Post::find($postId);
        $comment = Comment::find($id);
        $comment->title = $req->title;
        $comment->likes = $req->likes;
        $post->comments()->save($comment);
    }

    public function destroy($id)
    {
        return Comment::find($id)->delete();
    }

    public function allCommentsWithPosts()
    {
        $data = Comment::with('Post')->get();
        return response()->json($data);
    }

    public function singleCommentWithPost($id)
    {
        $data = Comment::with('Post')->find($id);
        // $data = Comment::with([
        //     'Post' => function ($q) {
        //         $q->where('id', 2);
        //     }
        // ])->find($id);
        return response()->json($data);
    }
}
