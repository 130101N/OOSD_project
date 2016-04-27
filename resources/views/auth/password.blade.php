@extends('master')
 
@section('content')
	<h2>This is password reset page</h2>
	<!-- resources/views/auth/password.blade.php -->

<form method="POST" action="password_email">
    {!! csrf_field() !!}

    <div>
        Email
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        <button type="submit">
            Send Password Reset Link
        </button>
    </div>
</form>
@stop
