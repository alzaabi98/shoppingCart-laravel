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
    return redirect()->route('store');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/store', 'HomeController@store')->name('store');


Route::get('/products', 'ProductController@index')->name('product.index');
Route::delete('/products/{product}', 'ProductController@destroy')->name('product.remove');
Route::put('/products/{product}', 'ProductController@update')->name('product.update');


Route::get('/addToCart/{product}', 'ProductController@addToCart')->name('cart.add');
Route::get('/shopping-cart', 'ProductController@showCart')->name('cart.show');


Route::get('/checkout/{amount}', 'ProductController@checkout')->name('cart.checkout')->middleware('auth');

Route::post('/charge', 'ProductController@charge')->name('cart.charge');

Route::get('/orders', 'OrderController@index')->name('order.index');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
