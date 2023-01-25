@extends('layouts.admin')

@section('content')

<div class="container">
        <h1 class="mt-4">Updates</h1>
        @if(Session::has('message'))
            <div class="alert alert-danger">{{ Session('message') }}</div>
        @endif
        <a href="{{ route('updates.add') }}" class="btn btn-outline-primary my-2">New Post</a>
        <div class="row">
            <div class="col-12 col-lg-6">
                <table class="table table-dark table-striped text-center">
                    <tr>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    @foreach($posts as $post)
                    <tr>
                        <td><a class="text-light underline" href="{{ route('updates.show', ['id' => $post->id]) }}">{{ $post->title }}</a></td>
                        <td><a href="{{ route('updates.edit', ['id' => $post->id]) }}" class="btn btn-warning text-light">Edit</a></td>
                        <td><a href="{{ route('updates.delete', ['id' => $post->id]) }}" class="btn btn-danger text-light">Delete</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection