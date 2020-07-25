@extends('master.layout')
@section('title')
    Sign In
@endsection
@section('content')

<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h1>Sign in</h1>
        <div class="alert">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
        <form action="{{ route('post.signin') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email" >Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" value="Sign in!" class="btn btn-primary">
            </div>
            <p>Don't have an account? <a href="{{ route('user.signup') }}">Sign up here!</a></p>
        </form>
    </div>
</div>


@endsection
@section('scripts')
@endsection