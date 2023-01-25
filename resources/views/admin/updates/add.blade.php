
@extends('layouts.admin')

@section('content')

    <div class="container">
        <h1 class="mt-4">New Post</h1>
        <a href="{{ route('updates.index') }}" class="btn btn-outline-primary mt-2 mb-3">&lsaquo; Back to Updates Page</a>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-12 col-lg-6">
                <form class="form-group" action="{{ route('updates.store') }}" method="POST">
                    @csrf
                    <label>Title</label>
                    <input class="form-control mb-2" name="title" type="text" value="{{ old('title') }}">
                    <label>Content</label>
                    <textarea rows="3" class="form-control mb-2" name="content">{{ old('content') }}</textarea>
                    <input class="btn btn-primary" type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>

@endsection