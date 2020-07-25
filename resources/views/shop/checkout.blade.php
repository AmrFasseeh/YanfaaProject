@extends('master.layout')
@section('title')
Checkout
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-sm-6 col-md-4">
        <h1>Checkout</h1>
        <h4>Your Total: ${{ $totalPrice }}</h4>
        <div id="charge-error" class="alert alert-danger" {{ Session::has('error') ? '' : 'hidden'  }}>
            {{ Session::get('error') }}
        </div>
        <form action="{{ route('create.order') }}" method="post" id="checkout-form">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="radio" id="payment_method" name="payment_method" value="0" required>
                        <label for="address">Cash on Delivery</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Buy now</button>
        </form>
    </div>
</div>
@endsection