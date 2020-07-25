@extends('master.layout')
@section('title')
    User Profile
@endsection
@section('content')
    <div class="row">
        <div class="col-md-4">
            <h1>Profile</h1>
            <h3>User: {{ Auth::user()->name }}</h3>
        </div>
    </div>
@endsection