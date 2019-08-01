@extends('layouts.admin')
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <section class="my-5">
        <h2>General Settings</h2>
        <hr>
        <div class="card">
            <div class="card-body">
                <form action="{{ url('/admin/settings/'.Auth::user()->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="email">Your Email</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email"
                            value="{{$admin_details->email}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="oldPassword">Current Password</label>
                        <input type="password" name="oldPassword" class="form-control" id="oldPassword"
                            placeholder="Enter Old Password">
                    </div>
                    <div class="form-group">
                        <label for="newPassword">New Password</label>
                        <input type="password" name="newPassword" class="form-control" id="newPassword"
                            placeholder="Enter New Password">
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" name="confirmPassword" class="form-control" id="confirmPassword"
                            placeholder="Enter Confirm Password">
                    </div>
                    <button type="submit" class="btn btn-outline-primary my-2">Update Settings</button>
                </form>
            </div>
        </div>
    </section>



    @if(count($errors))
    <section class="msg-area d-flex justify-content-end align-items-end fixed-bottom">
        <div class="w-100">
            @foreach ($errors->all() as $error)
            <div class="alert notice notice-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Error</strong> {{ $error }}
            </div>
            @endforeach
        </div>
    </section>
    @endif
    @if(Session::has('flash_message_error'))
    <section class="msg-area d-flex justify-content-end align-items-end fixed-bottom">
        <div class="w-100">
            <div class="alert notice notice-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Error</strong> {!! session('flash_message_error') !!}
            </div>
        </div>
    </section>
    @elseif(Session::has('flash_message_success'))
    <section class="msg-area d-flex justify-content-end align-items-end fixed-bottom">
        <div class="w-100">
            <div class="alert notice notice-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Note</strong> {!! session('flash_message_success') !!}
            </div>
        </div>
    </section>
    @endif
</main>
@endsection
