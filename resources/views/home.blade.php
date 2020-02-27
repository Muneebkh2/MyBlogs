@extends('layouts.app')

@section('content')
<!-- Page Header -->
<div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Dashboard</span>
        <h3 class="page-title">MyBlogs > Dashboard</h3>
    </div>
</div>
<!-- End Page Header -->

@if (session('status'))
<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <i class="fa fa-check mx-2"></i>
    <strong>Success!</strong> 
    {{ session('status') }}
</div>
@endif

<p>
    You are logged in!
</p>   
@endsection