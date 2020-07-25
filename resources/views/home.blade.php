@extends('master.layout')
@section('title')
Our Products
@endsection
@section('content')
<div class="row">
  <div class="col-12 mt-4">
    <h2>Our Products</h2>
  </div>
</div>
@if (isset($products))
<div class="row">
  @foreach ($products as $product)
  @if ($product->product_type == 1)
  <div class="col-4 mt-4">
    <div class="card" style="width: 18rem;">
      <img src="{{ $product->imagePath }}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{ $product->title }} <span class="badge badge-danger">On sale!</span></h5>
        <p class="card-text">{{ $product->description }}</p>
        <div class="float-left price">${{ $product->sale_price }} <small style="text-decoration: line-through;">${{ $product->price }}</small></div>
        <a href="{{ route('wishlist.Add', $product->id) }}" class="btn btn-primary float-right ml-1"><i class="fa fa-heart" aria-hidden="true"></i></a>
        <a href="{{ route('product.AddToCart', $product->id) }}" class="btn btn-primary float-right">Add to Cart</a>
      </div>
    </div>
  </div>
  @else
  <div class="col-4 mt-4">
    <div class="card" style="width: 18rem;">
      <img src="{{ $product->imagePath }}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{ $product->title }}</h5>
        <p class="card-text">{{ $product->description }}</p>
        <div class="float-left price">${{ $product->price }}</div>
        <a href="{{ route('wishlist.Add', $product->id) }}" class="btn btn-primary float-right ml-1"><i class="fa fa-heart" aria-hidden="true"></i></a>
        <a href="{{ route('product.AddToCart', $product->id) }}" class="btn btn-primary float-right">Add to Cart</a>
      </div>
    </div>
  </div>
  @endif
  @endforeach
</div>
@else
    <div class="row">
      <div class="col-md-6">
        <h3>No Products to display!</h3>
      </div>
    </div>
@endif

@endsection
@section('scripts')
@endsection