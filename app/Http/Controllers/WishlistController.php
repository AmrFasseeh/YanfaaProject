<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index() // displays all the products in db on the home page of the website

    {
        $wishlist = Auth::user()->wishlist;
        // dd($wishlist[1]->product);
        return view('user.userWishlist', ['wishlist' => $wishlist]);
    }

    public function getAddToWishlist($id)
    {
        // recieves the product id and then creates a new instance of the wishlist
        // and adds the product then saves it to the authenticated user
        $product = Product::findorfail($id);

        if (!($product->wishlist->isEmpty())) {
            $wishlist = $product->wishlist->first();
            $wishlist->qty += 1;
            if ($product->product_type == 1) {
                $wishlist->price += $product->sale_price;
            } else {
                $wishlist->price += $product->price;
            }
            $wishlist->save();
        } else {
            $wishlist = new Wishlist();
            $wishlist->product_id = $product->id;
            $wishlist->qty = 1;
            if ($product->product_type == 1) {
                $wishlist->price += $product->sale_price;
            } else {
                $wishlist->price += $product->price;
            }
            Auth::user()->wishlist()->save($wishlist);
        }

        return redirect()->back();
    }

    public function getAddToCart(Request $request, $id)
    {

        // Adds a single item from the wishlist to the cart and removes it from the wishlist

        $product = Product::findorfail($id);
        $wishlist = $product->wishlist->first();
        $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $cart = new Cart($oldCart);
        for ($i = 0; $i < $wishlist->qty; $i++) {
            $cart->add($product, $product->id);
        }
        $wishlist->delete();
        $request->session()->put('cart', $cart);
        return redirect()->route('product.shoppingCart');
    }

    public function getAddAllToCart(Request $request)
    {
        // move all the wishlist to the cart and removes them from the wishlist

        $wishlist = Auth::user()->wishlist;
        $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $cart = new Cart($oldCart);
        foreach ($wishlist as $singleItem) {
            for ($i = 0; $i < $singleItem->qty; $i++) {
                $cart->add($singleItem->product, $singleItem->product->id);
            }
            $singleItem->delete();
        }
        $request->session()->put('cart', $cart);
        return redirect()->route('product.shoppingCart');
    }

    public function getRemoveItem($id)
    {
        // Remove a single item from the wishlist 

        $product = Product::findorfail($id);
        if (!($product->wishlist->isEmpty())) {
            $wishlist = $product->wishlist->first();
            $wishlist->qty -= 1;
            if ($product->product_type == 1) {
                $wishlist->price -= $product->sale_price;
            } else {
                $wishlist->price -= $product->price;
            }
            $wishlist->save();
        }
        return redirect()->back();
    }

    public function getRemoveAllItems($id)
    {
        // Remove the whole product from the wishlist

        $product = Product::findorfail($id);
        if (!($product->wishlist->isEmpty())) {
            $wishlist = $product->wishlist->first();
            $wishlist->delete();
        }
        return redirect()->back();
    }

    public function emptyWishlist()
    {
        // Empties the whole wishlist

        $wishlist = Auth::user()->wishlist;
        foreach ($wishlist as $singleItem) {
            $singleItem->delete();
        }
        return redirect()->back();
    }
}
