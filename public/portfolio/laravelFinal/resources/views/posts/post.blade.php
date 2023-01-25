@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p class="quote">{{ $post->title}}</p>
            <p class="tag">Posted By: {{ $user->name }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <p><strong>Year:</strong> {{ $post->year }}</p>
            <hr class="post-separator">
            <p><strong>Make:</strong> {{ $post->make }}</p>
            <hr class="post-separator">
            <p><strong>Model:</strong> {{ $post->model }}</p>
            @if($post->trim != '')
            <hr class="post-separator">
            <p><strong>Trim:</strong> {{ $post->trim }}</p>
            
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            @if($post->description != '')
            <hr class="post-separator">
            <p><strong>Description:</strong> {{ $post->description }}</p>
            @endif
        </div>
    </div>
</div>
@endsection
