@extends('layout.main')

@section('content')
    <div class="col">
        <h1>Log in</h1>
        <form method="POST" action="/login">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="email">email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="name">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>


            <div class="form-group">

                <button type="submit" class="btn btn-primary">Log in</button>
            </div>

            @include('layout.errors')

        </form>
    </div>
@endsection
