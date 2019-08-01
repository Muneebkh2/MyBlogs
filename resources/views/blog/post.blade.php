@extends('layouts.app')

@section('title', 'Post-'.$post->title)

@section('content')
<div class="row">
    <section class="my-5">
        <div class="jumbotron">
            <img src="{{ url('/image/'.$post->image) }}" class="img-fluid w-100" alt="">
            <h1 class="display-4">{!! $post->title !!}</h1>
            <p class="lead">{{ $post->created_at->diffForHumans() }}</p>
            <hr class="my-4">
            <p>{!!$post->body !!}</p>
        </div>
    </section>
</div>
@endsection
