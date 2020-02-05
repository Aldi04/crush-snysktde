<?php

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

Route::get('/', function () {
    return view('user.layout');
});
Route::get('/shop', function () {
    return view('user.shop');
});
Route::get('/blog', function () {
    return view('user.blog');
});
Route::get('/blogPost', function () {
    return view('user.blogPost');
});
Route::get('/product-detail', function () {
    return view('user.product-detail');
});
Route::get('/cart', function () {
    return view('user.cart');
});


Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::resource('products', 'ProductController');
    Route::resource('category', 'CategoryController');
    Route::resource('order', 'OrderController');
    Route::resource('order_detail', 'OrderDetailController');
    Route::resource('payment_method', 'PaymentMethodController');
    Route::resource('product_image', 'ProductImageController');
});


Route::get('products', 'Front\ProductController@all'); // display all product
Route::get('products/{product_id}', 'Front\ProductController@detail'); // detail product
Route::post('products/{product_id}', 'Front\ProductController@order');
Route::post('products/{product_id}/checkout', 'Front\ProductController@checkout');
