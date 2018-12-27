@extends("layout.main")

@section("content")

<!-- Page Header -->
<header class="masthead" style="background-image: url('https://picsum.photos/1900/1267?image=1000')">
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
<h1>Create Post</h1>
<hr />
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <form method="POST" action="/post">
                {{ csrf_field() }}

                @include('layout.errors')

                <div class="form-group row">
                    <label for="title" class="col-form-label">Title</label>
                    <input type="title" class="form-control" id="title" name="title" required>
                </div>

                <div class="form-group row">
                    <label for="textarea1">Body</label>
                    <textarea class="form-control" id="textarea1" rows="3" name="body" required></textarea>
                </div>

                <div class="form-group row">
                    <button type="submit" class="btn btn-warning">Publish</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
