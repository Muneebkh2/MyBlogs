@extends('layouts.admin')
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <section class="my-5">
        <h2>Edit Post</h2>
        <hr>
        <div class="card mr-auto">
            <div class="card-body">
                <form method="POST" role="form" action="{{ url('/admin/update/post').'/'.$blogs->id }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Post Title</label>
                        <input type="text" name="title" value="{{$blogs->title}}" class="form-control" id="exampleFormControlInput1" placeholder="enter title here">
                    </div>
                    <div class="custom-file">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                        <input type="file" name="image" class="custom-file-input" id="customFile">
                    </div>
                    <div class="form-group mt-2">
                        <label for="myTextarea">Post Description</label>
                        <textarea class="form-control" name="body" id="myTextarea"  rows="3">{{$blogs->body}}</textarea>
                        <button type="submit" class="btn btn-primary my-2">Edit Post</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    {{-- Message BOX --}}
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
