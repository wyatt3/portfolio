@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mt-4">Admin Panel</h1>
    <h3>Edit About Image</h3>
    <img src="{{ asset('storage/img/profileImage.jpg') }}" height="350px">
    <form class="form-group" method="POST" enctype="multipart/form-data">
        <input class="mt-3 form-control-file" type="file">
        <input class="btn btn-primary mt-3" type="submit" value="Upload">
    </form>

    <h3>Upload New Resume</h3>
    <form class="form-group" method="POST" enctype="multipart/form-data">
        <input class="mt-3 form-control-file" type="file">
        <input class="btn btn-primary mt-3" type="submit" value="Upload">
    </form>
</div>

@endsection