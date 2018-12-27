@extends("layout.main")

@section("content")
<!-- Page Header -->
<header class="masthead" style="background-image: url('https://picsum.photos/1900/586?image=809')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>{{ $post->title }}</h1>
                    <p class="post-meta">{{ $post->user->name }}, {{ $post->created_at->toFormattedDateString() }}</p>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-preview">
                <h2 class="post-title">
                    {{ $post->title }}
                </h2>

                <div class="post-content">
                    {!! nl2br($post->body) !!}
                </div>

                <p class="post-meta">Posted by<a href="#"> {{ $post->user->name }} </a>on {{ $post->created_at->toFormattedDateString() }}</p>
            </div>

            <hr>

            <h2 class="">Leave a Comment</h2>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="" method="POST" action="/post/{{ $post->id }}/comments">

                        {{ csrf_field() }}

                        @include('layout.errors')
                        <div class="form-group">
                            <input type="test" name="name" placeholder="your name here" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <textarea name="body" class="form-control" placeholder="your comments here." required></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </div>
            </div>

            @if($post->comment)
            <h2 class="post-title">Comments</h2>
                <div class="comments">
                    <ul class="list-group">
                        @foreach($post->comment as $comment)
                        <li class="list-group-item">
                            <strong>{{ $comment->body }}</strong> - by {{ $comment->name }}, {{ $comment->created_at->diffForHumans() }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
