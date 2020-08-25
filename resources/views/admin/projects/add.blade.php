@extends('layouts.admin')

@section('content')

    <div class="container">
        <h1 class="mt-4">Add Project</h1>
        <a href="{{ route('projects.index') }}" class="btn btn-outline-primary mt-2 mb-3">&lsaquo; Back to Projects Page</a>
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
                <form class="form-group" action="{{ route('projects.store') }}" method="POST">
                    @csrf
                    <label>Title</label>
                    <input class="form-control mb-2" name="title" type="text" value="{{ old('title') }}">
                    <label>Oneline</label>
                    <input class="form-control mb-2" name="oneline" type="text" value="{{ old('oneline') }}">
                    <label>Description</label>
                    <textarea rows="3" class="form-control mb-2" name="description">{{ old('description') }}</textarea>
                    <label>Link</label>
                    <input class="form-control mb-3" name="link" type="text" value="{{ old('link') }}">
                    <input class="btn btn-primary" type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>

@endsection