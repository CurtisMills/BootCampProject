<head>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous"
    />
    <title>Housemate.com</title>
</head>

<body>
    @section('navbar')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <div class="navbar-nav">
            <a class="navbar-brand" href="#">Housemate</a>
                <a class="nav-item nav-link" href="{{ route('home') }}"
                    >Home</span></a
                >
                <a class="nav-item nav-link" href="{{ route('matches.index') }}">Matches</a>
                <a class="nav-item nav-link" href="{{ route('profile.edit', Auth::user()) }}">Edit Profile</a>
                <a class="nav-item nav-link" href="{{ route('viewLikes') }}">Review Likes</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-outline-danger my-2 my-sm-0" style="float: right;">Logout</button>
                </form>

    </nav>
    @show

    <div class="container" style="padding-top: 20px;">@yield('content')</div>
</body>