@extends('master.layout')
@section('title')
    Sign Up
@endsection
@section('content')

<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h1>Sign up</h1>
        <div class="alert">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
        <form action="{{ route('post.signup') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="email" >Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" name="password_confirmation" id="confirm-password" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" value="Sign up!" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>


@endsection
@section('scripts')
@endsection