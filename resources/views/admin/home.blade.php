@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mt-4">Admin Panel</h1>
    @if(Session::has('message'))
        <div class="alert alert-primary">{{ Session('message') }}</div>
    @endif
    <h3>Edit About Image</h3>
    <img src="{{ asset('storage/img/profileImage.jpg') }}" height="350px">
    <form class="form-group" action="{{ route('profile.image') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input class="mt-3 form-control-file" name="photo" type="file">
        @error('photo')
            <div class="mt-3 alert alert-danger" style="width: 25%">{{ $message }}</div>
        @enderror
        <p class="mt-1">* Image dimensions are 325 pixels by 358 pixels *</p>
        <input class="btn btn-primary" type="submit" value="Upload">
    </form>

    <h3>Upload New Resume</h3>
    <form class="form-group" action="{{ route('profile.resume') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input class="mt-3 form-control-file" name="resume" type="file">
        <input class="btn btn-primary mt-3" type="submit" value="Upload">
    </form>
</div>

@endsection