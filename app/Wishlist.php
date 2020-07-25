<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Wishlist extends Model
{
    // public $items = null;
    // public $totalQty = 0;
    // public $totalPrice = 0;

    // public function __construct($oldWishlist)
    // {
    //     // Cart Constructor

    //     if ($oldWishlist) {
    //         $this->items = $oldWishlist->items;
    //         $this->totalQty = $oldWishlist->totalQty;
    //         $this->totalPrice = $oldWishlist->totalPrice;
    //     }
    // }

    protected $fillable = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    // public function add($item, $id)  // add function which takes an item(product) and its ID and then adds them to the cart items array
    // {
    //     $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];

    //     if ($this->items) {
    //         if (array_key_exists($id, $this->items)) {
    //             $storedItem = $this->items[$id];
    //         }
    //     }
    //     $storedItem['qty']++;
    //     if ($item->product_type == 1) {
    //         $storedItem['price'] = $item->sale_price * $storedItem['qty'];
    //         $this->totalPrice += $item->sale_price;
    //         $this->total_price += $item->sale_price;
    //     } else {
    //         $storedItem['price'] = $item->price * $storedItem['qty'];
    //         $this->totalPrice += $item->price;
    //         $this->total_price += $item->price;
    //     }
    //     $this->items[$id] = $storedItem;
    //     $this->totalQty++;
        
    // }

    // public function removeItem($item, $id)  // removes a single item from the items array inside the cart
    // {
    //     $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];

    //     if ($this->items) {
    //         if (array_key_exists($id, $this->items)) {
    //             $storedItem = $this->items[$id];
    //         }
    //     }
    //     $storedItem['qty']--;
    //     if ($item->product_type == 1) {
    //         $storedItem['price'] = $item->sale_price * $storedItem['qty'];
    //         $this->totalPrice -= $item->sale_price;
    //     } else {
    //         $storedItem['price'] = $item->price * $storedItem['qty'];
    //         $this->totalPrice -= $item->price;
    //     }
    //     $this->items[$id] = $storedItem;
    //     $this->totalQty--;
        
    //     if ($storedItem['qty'] == 0) {
    //         unset($this->items[$id]);
    //     }
    // }

    // public function removeAllItems($item, $id)  //removes a whole product from the items array
    // {
    //     $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];

    //     foreach ($this->items as $singleItem) {
    //         if ($singleItem) {
    //             // dd($singleItem);
    //             if ($singleItem['item']['id'] == $id) {
    //                 $storedItem = $singleItem;
    //                 $this->totalQty -= $storedItem['qty'];
    //                 $this->totalPrice -= $storedItem['price'];
    //                 unset($this->items[$id]);
    //             }
    //         }
    //     }
    // }

    // public function emptyWishlist(Request $request) // Empties the whole cart by forgetting the cart from the session
    // {
    //     $request->session()->forget('wishlist');
    // }
}
