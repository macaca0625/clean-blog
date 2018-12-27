<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Comment;


class CommentController extends Controller
{
    public function __contruct() {
        $this->middleware('auth')->except(['show']);
    }

    public function store(Post $post){

        $this->validate(request(), [
            'name' => 'required|min:2',
            'body' => 'required|min:2'
        ]);

        Comment::Create([
            'user_id' => auth()->id(),
            'post_id' => $post->id,
            'name' => request('name'),
            'body' => request('body'),
        ]);


        return back();
    }
}
