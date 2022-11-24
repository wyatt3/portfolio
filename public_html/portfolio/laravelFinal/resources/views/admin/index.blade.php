@extends('layouts.admin')

@section('content')
    @if(Session::has('info'))
    <div class="row">
        <div class="col-md-12">
            <p class="alert alert-info">{{Session::get('info') }}</p>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.create') }}" class="btn btn-info">New Post</a>
            <a href="{{ route('admin.close_account') }}" class="btn btn-warning pull-right">Close Account</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-4">
        @foreach($posts as $post)
            <p><strong>{{ $post->title }}</strong>
            @if($user->id == $post->user_id || $post->public == 1 )
                <a href="{{ route('admin.edit', ['id' => $post->id]) }}">Edit</a>
                @if($post->public == 1)
                <span class="warning-text">&nbsp;(Public)</span>
                @else
                <a href="{{ route('admin.delete', ['id' => $post->id]) }}">Delete</a>
                @endif
            @else
                <span class='warning-text'>(Not Owned)</span>
            @endif
            </p>
            <hr class='admin-post-separator'>
        @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            {{ $posts->links() }}    
        </div>
    </div>
@endsection