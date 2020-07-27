@extends('master.layout')
@section('title')
    User Profile
@endsection
@section('content')
    <div class="row">
        <div class="col-md-4">
            <h1>Profile</h1>
            <h4>{{ Auth::user()->name }}</h4>
            <h5>Orders: {{ Auth()->user()->orders->count() }}</h5>
        </div>
    </div>
@endsection