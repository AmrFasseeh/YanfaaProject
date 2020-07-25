@extends('master.layout')
@section('title')
User Orders
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-md-offset-4 col-sm-offset-3 mt-4">
        <ul class="list-group">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Price</th>
                    <th scope="col">Payment Method</th>
                  </tr>
                </thead>
                <tbody>
            @foreach ($orders as $order)
                  <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->address }}</td>
                    <td>${{ $orderInfo[$order->id] }}</td>
                    <td>{{ $order->payment_method == '0' ? 'Cash on delivery' : 'Credit Card'}}</td>
                  </tr>      
            @endforeach
        </tbody>
    </table>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-sm-6">
        <strong>Total Payments: ${{ $total }}</strong>
    </div>
</div>


@endsection