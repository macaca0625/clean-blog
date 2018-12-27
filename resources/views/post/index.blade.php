@extends("layout.main")

@section("content")

<!-- Page Header -->
<header class="masthead" style="background-image: url('https://picsum.photos/1900/1267?image=885')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Lazylist playground</h1>
                    <span class="subheading">I dont know what I'm doing here.</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <a href="/post/create"><button type="button" class="btn btn-warning">Create</button></a>
            @foreach($showPosts as $post)
            <div class="post-preview">
                <a href="/post/{{ $post->id }}">
                    <h2 class="post-title">
                        {{ $post->id }}. {{ $post->title }}
                    </h2>
                    <h3 class="post-subtitle">

                    </h3>
                </a>
                <p class="post-meta">Posted by<a href="#"> {{ $post->user->name }} </a>on {{ $post->created_at->diffForHumans() }}</p>
            </div>
            <hr>
            @endforeach

            <!-- Pager -->
            <div class="clearfix">
                {{ $showPosts->links() }}
            </div>
        </div>
        <div class="col-md-4">
            <h2 class="post-title">Archives</h2>
            <ul>
                @foreach($archives as $archive)

                    <a href="?month={{ $archive['month'] }}&year={{ $archive['year'] }}"><li>{{ $archive['month'] }}, {{ $archive['year'] }}({{ $archive['published'] }})</li></a>

                @endforeach
            </ul>

            <h2 class="post-title">Latest</h2>
            <ul>
                @foreach($latestPosts as $post)

                    <a href="{{ $post['id'] }}"><li>{{ $post['title'] }}</li></a>

                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
