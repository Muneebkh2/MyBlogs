@extends('layouts.admin')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 pb-2 mb-3 border-bottom">
        <h1 class="h2">Recents Posts</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{ url('admin/create/post') }}" class="btn btn-sm btn-outline-primary">Create New +</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Image</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blogs as $key => $value)
                <tr>
                    <td>{{ $value->index }}</td>
                    <td>{{ $value->title }}</td>
                    <td>{!! substr($value->body, 0, 50) !!}{!! @strlen($value->body)>50 ? '...' : ""!!}</td>
                    <td>{{ $value->image }}</td>
                    <td>{{ $value->created_at }} </td>
                    <td>{{ $value->updated_at }} </td>
                    <td>
                        <a href="{{ url('/admin/edit/post/'.$value->id) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                        &nbsp;<a href="{{ url('/admin/delete/post/'.$value->id) }}" class="btn btn-outline-primary btn-sm">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
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
