<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @include('layouts.partials.header')
</head>
<body class="h-100">
    <div id="app">
        <div class="container-fluid">
            <div class="row">
                @include('layouts.partials.sidebar')
                <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                    @include('layouts.partials.navbar')
                    <div class="main-content-container container-fluid px-4">
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>
    </div>
    @include('layouts.partials.footer')
</body>
</html>
