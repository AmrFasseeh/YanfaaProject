@extends('master.layout')
@section('title')
Wishlist
@endsection
@section('content')
<div class="row">
    <div class="col-md-6 col-sm-6 mt-4 mb-4">
        <h2>Wishlist</h2>
    </div>
</div>
@if (!(Auth::user()->wishlist->count() == 0))
<div class="row">
    <div class="col-md-6 col-sm-6 mt-4 mb-4">
        <h2>Wishlist</h2>
        <a href="{{ route('wishlist.Empty') }}" class="btn btn-danger">Empty Wishlist!</a>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-sm-6 col-md-offset-4 col-sm-offset-3">
        <ul class="list-group">
            @foreach ($wishlist as $item)
            @if ($item->product->product_type == 1)
            <li class="list-group-item">
                <span class="badge badge-pill badge-primary">{{ $item->qty }}</span>
                <strong>{{ $item->product->title }} <span class="badge badge-danger">On sale!</span></strong>
                <span class="label label-success">${{ $item->product->sale_price }}</span>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('wishlist.AddToCart', $item->product->id) }}">Add to Cart</a>
                        <a class="dropdown-item" href="{{ route('wishlist.Add', $item->product->id) }}">Add 1 item</a>
                        <a class="dropdown-item" href="{{ route('wishlist.RemoveItem', $item->product->id) }}">Remove 1 item</a>
                        <a class="dropdown-item" href="{{ route('wishlist.RemoveAllItems', $item->product->id) }}">Remove all</a>
                    </div>
                </div>
            </li>
            @else
            <li class="list-group-item">
                <span class="badge badge-pill badge-primary">{{ $item->qty }}</span>
                <strong>{{ $item->product->title }}</strong>
                <span class="label label-success">${{ $item->product->price }}</span>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('wishlist.AddToCart', $item->product->id) }}">Add to Cart</a>
                        <a class="dropdown-item" href="{{ route('wishlist.Add', $item->product->id) }}">Add 1 item</a>
                        <a class="dropdown-item" href="{{ route('wishlist.RemoveItem', $item->product->id) }}">Remove 1 item</a>
                        <a class="dropdown-item" href="{{ route('wishlist.RemoveAllItems', $item->product->id) }}">Remove all</a>
                    </div>
                </div>
            </li>
            @endif
                
            @endforeach
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-sm-6">
        <strong>Total Price: ${{ $wishlist->sum('price') }}</strong>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-sm-6">
        <a href="{{ route('wishlist.AddAllToCart') }}" class="btn btn-success">Add all to cart!</a>
    </div>
</div>
@else
<div class="row">
    <div class="col-md-6 col-sm-6">
        <strong>Wishlist is empty!</strong>
    </div>
</div>
@endif

@endsection