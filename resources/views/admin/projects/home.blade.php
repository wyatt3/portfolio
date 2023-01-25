@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="mt-4">Projects</h1>
        @if(Session::has('message'))
            <div class="alert alert-danger">{{ Session('message') }}</div>
        @endif
        <a href="{{ route('projects.add') }}" class="btn btn-outline-primary my-2">Add Project</a>
        <div class="row">
            <div class="col-12 col-lg-8">
                <table class="table table-dark table-striped text-center">
                    <tr>
                        <th>Title</th>
                        <th>Oneline</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    @foreach($projects as $project)
                    <tr>
                        <td><a class="text-light underline" href="{{ route('projects.show', ['id' => $project->id]) }}">{{ $project->title }}</a></td>
                        <td>{{ $project->oneline }}</td>
                        <td><a href="{{ route('projects.edit', ['id' => $project->id]) }}" class="btn btn-warning text-light">Edit</a></td>
                        <td><a href="{{ route('projects.delete', ['id' => $project->id]) }}" class="btn btn-danger text-light">Delete</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection