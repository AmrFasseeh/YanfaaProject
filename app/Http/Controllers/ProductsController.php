<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Schema;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) 
    {
        // checks if the products table is in the db, if not it calls the migration comand and seeds the db
        // then redirects back to the same link again
        if (Schema::hasTable('products')) {
            $products = Product::all();
            if (!($products->isEmpty())) {
                return view('home', ['products' => $products]);
            }
            return view('home');
        }
        $request->session()->flush();
        Artisan::call('migrate');
        Artisan::call('db:seed');

        return redirect()->back();
    }

    public function getAddToCart(Request $request, $id)
    {
        //recieves the product id that needs to be added to the cart and then creates a new instance of the cart with the old cart
        // if available and then adds the new product using the add function implemeted in the Cart model
        $product = Product::findorfail($id);
        $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        // dd($request->session()->get('cart'));
        return redirect()->back();
    }

    public function getRemoveItem(Request $request, $id)
    {
        // Removes an single item from the cart using the removeItem function implemeted in the Cart model

        $product = Product::findorfail($id);
        $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($product, $product->id);
        $request->session()->put('cart', $cart);
        // dd();
        if($cart->items == null){
            $request->session()->forget('cart');
        }
        return redirect()->back();
    }

    public function getRemoveAllItems(Request $request, $id)
    {
        // Removes the whole product from the cart even if it have more than one item in that product

        $product = Product::findorfail($id);
        $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeAllItems($product, $product->id);
        $request->session()->put('cart', $cart);
        if($cart->items == null){
            $request->session()->forget('cart');
        }
        return redirect()->back();
    }

    public function emptyCart(Request $request)
    {
        // Empties the whole cart

        $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->emptyCart($request);
        return redirect()->back();
    }

    public function getShoppingCart(Request $request)
    {
        //  gets the shopping cart from the session and sends to the view shopping-cart

        // $request->session()->flush();
        $currentCart = $request->session()->get('cart');
        // dd($currentCart);
        if ($currentCart) {
            $cart = new Cart($currentCart);
            return view('shop.shopping-cart', [
                'products' => $cart->items,
                'totalPrice' => $cart->totalPrice,
                'totalQty' => $cart->totalQty,
            ]);
        } else {
            return view('shop.shopping-cart');
        }
        // dd($currentCart);
    }

    public function getCheckout(Request $request)
    {
        // checks if the there is a cart in the session if available returns the checkout form to complete the payment

        if (!$request->session()->has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = $request->session()->get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;

        return view('shop.checkout', [
            'totalPrice' => $total,
        ]);
    }
}
