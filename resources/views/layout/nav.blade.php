 <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="/">Playground</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu<i class="fa fa-bars"></i></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="/ytapi">YoutubeAPI</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/post">Posts</a>
                </li>

                @if(Auth::check())

                    <li class="nav-item ml-auto">
                        <a href="">Hi, {{ Auth::user()->name }}</a>
                    </li>

                    <li class="nav-item ml-auto">
                        <a href="/logout">Logout</a>
                    </li>

                @else

                    <li class="nav-item ml-auto">
                        <a href="/login">Login</a>
                    </li>

                    <li class="nav-item ml-auto">
                        <a href="/register">Register</a>
                    </li>

                @endif
            </ul>
        </div>
    </div>
</nav>
