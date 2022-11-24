@extends('layouts.master')

@section('content')
<?php //dd($posts); ?>
<div class="container">
@if(Session::has('info'))
    <div class="row">
        <div class="col-md-12">
            <p class="alert alert-info">{{Session::get('info') }}</p>
        </div>
    </div>
@endif
    <div class="row">
        <div class="col-md-12">
            <p class="quote">My Favorite Cars</p>
        </div>
    </div>
    @foreach($posts as $post)
    <div class="row post">
        <div class="col-md-12">
            <h1 class="post-title">{{ $post->title }}</h1>
            <p style="font-weight: bold">
            </p>
            <p>{{ $post->content }}</p>
            <p><a href="{{ route('posts.post', ['id' => $post->id]) }}">Read more...</a></p>
        </div>
    </div>
    <hr>
    @endforeach
    <div class="row">
        <div class="col-md-12 text-center">
            {{ $posts->links() }}    
        </div>
    </div>
</div>
@endsection
