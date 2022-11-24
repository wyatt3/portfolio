@extends('layouts.admin')

@section('content')

    <div class="container">
        <h2 class="">Are you sure you want to close this account?</h2>
        <p>Closing the account will delete all data related to this user, including all posts created by this user.</p>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('admin.close_account') }}" method="post">
                    <a href="{{ route('admin.index') }}" class="btn btn-info">Return to Home Page</a>
                    <input type="submit" class="btn btn-danger" value="Close Account">
                    {{csrf_field()}}
                </form>
            </div>
        </div>
    </div>
@endsection