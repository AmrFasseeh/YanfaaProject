<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', 'ProductsController@index')->name('home');

Route::group(['prefix' => 'cart'], function () {
    Route::get('add-to-cart/{id}', 'ProductsController@getAddToCart')->name('product.AddToCart');
    Route::get('remove-item/{id}', 'ProductsController@getRemoveItem')->name('product.RemoveItem');
    Route::get('remove-all-items/{id}', 'ProductsController@getRemoveAllItems')->name('product.RemoveAllItems');
    Route::get('empty-cart', 'ProductsController@emptyCart')->name('product.EmptyCart');
    Route::get('shopping-cart', 'ProductsController@getShoppingCart')->name('product.shoppingCart');
});

Route::group(['prefix' => 'wishlist'], function () {
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/', 'WishlistController@index')->name('user.wishlist');
        Route::get('add-to-wishlist/{id}', 'WishlistController@getAddToWishlist')->name('wishlist.Add');
        Route::get('add-to-cart/{id}', 'WishlistController@getAddToCart')->name('wishlist.AddToCart');
        Route::get('move-all-to-cart', 'WishlistController@getAddAllToCart')->name('wishlist.AddAllToCart');
        Route::get('remove-item/{id}', 'WishlistController@getRemoveItem')->name('wishlist.RemoveItem');
        Route::get('remove-all-items/{id}', 'WishlistController@getRemoveAllItems')->name('wishlist.RemoveAllItems');
        Route::get('empty', 'WishlistController@emptyWishlist')->name('wishlist.Empty');
    });
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('checkout', 'ProductsController@getCheckout')->name('checkout');
    Route::post('checkout', 'ProductsController@postCheckout')->name('post.checkout');
    Route::post('confirm-order', 'OrderController@createOrder')->name('create.order');
});

Route::group(['prefix' => 'user'], function () {
    Route::group(['middleware' => ['guest']], function () {
        Route::get('sign-up', 'UserController@getSignup')->name('user.signup');
        Route::post('sign-up', 'UserController@postSignup')->name('post.signup');
        Route::get('sign-in', 'UserController@getSignin')->name('user.signin');
        Route::post('sign-in', 'UserController@postSignin')->name('post.signin');
    });
    Route::group(['middleware' => ['auth']], function () {
        Route::get('profile', 'UserController@getProfile')->name('user.profile');
        Route::get('user/orders', 'OrderController@getOrders')->name('user.orders');
        Route::get('logout', 'UserController@getLogout')->name('user.logout');
    });
});
