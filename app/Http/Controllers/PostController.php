<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Repositories\Posts as PostsRepo;
use Carbon\Carbon;

class PostController extends Controller
{
    protected $postsRepo;

    public function __contruct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(PostsRepo $postsRepo)
    {
        $showPosts = $postsRepo->showPosts();
        $archives = $postsRepo->archives();

        return view("post.index", compact('showPosts','archives'));
    }

    public function show(Post $post)
    {
        return view("post.show", compact('post'));
    }

    public function create()
    {
        return view("post.create");
    }

    public function store(Post $post)
    {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
        ]);

        Post::create([
            'user_id' => auth()->id(),
            'title' => request('title'),
            'body' => request('body'),
        ]);

        return redirect('/post');
    }
}
