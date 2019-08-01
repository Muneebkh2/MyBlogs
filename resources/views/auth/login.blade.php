@extends('layouts.auth_app')

@section('content')

<form class="form-signin" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="text-center mb-4">
        <img class="mb-4" src="{{ asset('image/brand/offical_logo.png') }}" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">SIGN IN</h1>
    </div>
    <div class="form-label-group">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}" required autocomplete="email" placeholder="Email address" autofocus>
        <label for="email">{{ __('E-Mail Address') }}</label>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-label-group">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
            name="password" required placeholder="Password" autocomplete="current-password">

        <label for="password">{{ __('Password') }}</label>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="custom-control custom-checkbox checkbox mb-3">
        <input class="custom-control-input" type="checkbox" name="remember" id="remember"
            {{ old('remember') ? 'checked' : '' }}>
        <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
    </div>
    {{-- <div class="checkbox mb-3">
        <label>
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            {{ __('Remember Me') }}
        </label>
    </div> --}}

    <button class="btn btn-lg btn-primary btn-block " type="submit">{{ __('Login') }}</button>
    @if (Route::has('password.request'))
    <a class="btn btn-link mt-3 mx-auto" href="{{ route('password.request') }}">
        {{ __('Forgot Your Password?') }}
    </a>
    @endif
    <p class="mt-5 mb-3 text-muted text-center">&copy; 2019 MyBlogs inc.</p>
</form>







{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div> --}}
@endsection
