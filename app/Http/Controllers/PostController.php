<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function index()
    {
        return Post::all();
    }

    public function store(Request $req)
    {
        $post = new Post();
        $post->title = $req->title;
        $post->body = $req->body;
        $post->likes = $req->likes;
        $post->save();
    }

    public function show($id)
    {
        return Post::find($id);
    }

    public function update(Request $req, $id)
    {

        $post = Post::find($id);
        $post->title = $req->title;
        $post->body = $req->body;
        $post->likes = $req->likes;
        $post->save();
    }

    public function destroy($id)
    {
        return Post::find($id)->delete();
    }

    public function allPostsWithComments()
    {
        $postsWithComments = Post::with('comments')->get();
        return response()->json($postsWithComments);
    }

    public function singlePostWithComment($id)
    {
        $data = Post::with('comments')->find($id);
        return response()->json($data);
    }
}
