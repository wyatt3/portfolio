@extends('layouts.admin')

@section('content')

    <div class="container">
        <h1 class="mt-4">{{ $project->title }}</h1>
        <p><strong>Oneline: </strong>{{ $project->oneline }}</p>
        <p><strong>Description: </strong>{{ $project->description }}</p>
        <p><strong>Link: </strong><a target="_blank" href="{{ $project->link }}">{{ $project->link }}</a></p>
        <a class="btn btn-warning text-light" href="{{ route('projects.edit', ['id' => $project->id]) }}">Edit</a>
        <a class="btn btn-danger" href="{{ route('projects.delete', ['id' => $project->id]) }}">Delete</a>
    </div>

@endsection