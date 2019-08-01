<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Dashboard Template · Bootstrap</title>

    {{--  <link rel="icon" href="{{ asset('image/brand/fav.ico') }}">  --}}
    <link rel="icon" href="{{ asset('image/brand/fav.ico') }}">
    {{--  <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/dashboard/">  --}}

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Bootstrap -->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> --}}


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

    </style>
    <!-- Custom styles for this template -->
    {{-- <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet"> --}}
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top border-bottom navbar-light bg-light p-0">
        <a class="navbar-brand p-0" href="{{ url('/') }}">
            <img src="{{asset('image/brand/offical_logo.png')}}"/>  {{-- config('app.name', 'Laravel') --}}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->email }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('admin/create/post') }}">
                                <span data-feather="file"></span>
                                Create Post
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/admin') }}">
                                <span data-feather="shopping-cart"></span>
                                Show Posts
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('admin/settings/'.Auth::user()->id) }}">
                                <span data-feather="users"></span>
                                Settings
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="fixed-bottom"><kbd class="time">{{ now() }}</kbd></div>
            </nav>
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.1/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: '#myTextarea',
            height: 300,
            theme: 'modern',
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools'
            ],
            toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print preview media | forecolor backcolor emoticons',
            image_advtab: true
        });

    </script>
</body>

</html>
