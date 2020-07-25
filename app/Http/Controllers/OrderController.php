<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function createOrder(Request $request)   // recieve the request from checkout page and creates a new order then saves it in the db
    {   
        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'payment_method' => 'required|integer'
        ]);

        $oldCart = $request->session()->get('cart');
        $cart = new Cart($oldCart);
        $newOrder = new Order();
        $newOrder->cart = serialize($cart);
        $newOrder->name = $request->name;
        $newOrder->address = $request->address;
        $newOrder->payment_method = $request->payment_method;
        Auth::user()->orders()->save($newOrder);
        $request->session()->forget('cart');

        return redirect()->route('home')->with('message', 'Order Confirmed!');
    }



    public function getOrders()         // retrieve orders from database and display it in the orders page
    {
        $orders = Auth::user()->orders;
        $total = 0;
        $orderInfo = [];
        foreach($orders as $order){
            $currentCart = unserialize($order->cart);
            $total += $currentCart->totalPrice;
            $orderInfo[$order->id] = $currentCart->totalPrice;
        }
        
        return view('user.userOrders', [
            'orders' => $orders,
            'total' => $total,
            'orderInfo' => $orderInfo
        ]);
    }
}
