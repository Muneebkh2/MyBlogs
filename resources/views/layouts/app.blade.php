<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Blogs - @yield('title')</title>

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


</head>

<body>

    <nav class="navbar fixed-top border-bottom navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ url('/blog') }}">My Blogs</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="navbar-brand" href="{{ url('/login') }}">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="my-5">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>
