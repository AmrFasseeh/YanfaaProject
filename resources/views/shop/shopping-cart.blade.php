@extends('master.layout')
@section('title')
Shopping Cart
@endsection
@section('content')
<div class="row">
    <div class="col-md-6 col-sm-6 mt-4 mb-4">
        <h2>Shopping Cart</h2>
    </div>
</div>
@if (Session::has('cart'))
<div class="row">
    <div class="col-md-6 col-sm-6 mt-4 mb-4">
        <a href="{{ route('product.EmptyCart') }}" class="btn btn-danger">Empty Cart!</a>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-sm-6 col-md-offset-4 col-sm-offset-3">
        <ul class="list-group">
            @foreach ($products as $product)
            @if ($product['item']['product_type'] == 1)
            <li class="list-group-item">
                <span class="badge badge-pill badge-primary">{{ $product['qty'] }}</span>
                <strong>{{ $product['item']['title'] }} <span class="badge badge-danger">On sale!</span></strong>
                <span class="label label-success">${{ $product['item']['sale_price'] }}</span>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li> <a href="{{ route('product.AddToCart', $product['item']['id']) }}">Add 1 item</a></li>
                        <li> <a href="{{ route('product.RemoveItem', $product['item']['id']) }}">Remove 1 item</a></li>
                        <li> <a href="{{ route('product.RemoveAllItems', $product['item']['id']) }}">Remove all</a></li>
                    </ul>
                </div>
            </li>
            @else
            <li class="list-group-item">
                <span class="badge badge-pill badge-primary">{{ $product['qty'] }}</span>
                <strong>{{ $product['item']['title'] }}</strong>
                <span class="label label-success">${{ $product['item']['price'] }}</span>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li> <a href="{{ route('product.AddToCart', $product['item']['id']) }}">Add 1 item</a></li>
                        <li> <a href="{{ route('product.RemoveItem', $product['item']['id']) }}">Remove 1 item</a></li>
                        <li> <a href="{{ route('product.RemoveAllItems', $product['item']['id']) }}">Remove all</a></li>
                    </ul>
                </div>
            </li>
            @endif
                
            @endforeach
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-sm-6">
        <strong>Total Price: ${{ $totalPrice }}</strong>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-sm-6">
        <a href="{{ route('checkout') }}" class="btn btn-success">Checkout</a>
    </div>
</div>
@else
<div class="row">
    <div class="col-md-6 col-sm-6">
        <strong>Cart is empty!</strong>
    </div>
</div>
@endif

@endsection