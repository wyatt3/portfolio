@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mt-4">Mail</h1>
    @if(Session::has('message'))
        <div class="alert alert-primary">{{ Session('message') }}</div>
    @endif

    <table style="width:50%;" class="table table-dark table-striped text-center">
        <tr>
            <th>From</th>
            <th>Delete</th>
        </tr>
        @foreach($mails as $mail)
        <tr>
            <td><a href="#" data-toggle="modal" data-target="#modal-mail-{{ $mail->id }}">{{ $mail->email }}</a></td>
            <td><a class="btn btn-danger" href="{{ route('mail.delete', ['id' => $mail->id]) }}">Delete</a></td>
        </tr>
        @endforeach
    </table>
    @foreach($mails as $mail)
    <div class="modal fade" id="modal-mail-{{ $mail->id }}" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-secondary text-light">
                <div class="modal-body">
                    <button type="button" class="close text-light" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <p>
                        <strong>Name: </strong>{{ $mail->name }}<br>
                        <strong>Reply Email: </strong>{{ $mail->email }}<br>
                        <strong>Message: </strong><br>
                        {{ $mail->message }}
                    </p>
                </div>
                <div class="modal-footer" style="border-top: solid 1px #222c3b">
                    <button type="button" class="btn btn-warning mr-auto text-light" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection