@extends('layouts.app')

@section('title', 'Index')

@section('content')
<div class="row">
    <section class="mt-5">
        <div class="col-md-12">
            <h1>Recents Blogs</h1>
        </div>
    </section>
</div>
<div class="row">
    <div class="col-md-6 my-5">
        @foreach($blog as $key => $value)
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="{{ asset('image/'.$value->image) }}" class="card-img height_100" alt="">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $value->title }}</h5>
                        <p class="card-text">{!! substr($value->body, 0, 200) !!} {{ strlen($value->body) > 200 ? '....' : ""}}</p>
                        <p class="card-text">Posted On : <small class="text-muted">{{ $value->created_at->diffForHumans() }}</small></p>
                        <a class="btn btn-primary btn-sm" href="{{url('/blog/show',$value->id)}}" role="button">Learn more</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
