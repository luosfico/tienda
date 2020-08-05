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
Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('index');
Route::get('account', 'HomeController@account')->name('account')->middleware('verified');
Route::get('agregar-producto/{product}', 'CartController@add')->name('cart.add');
Route::get('productos/{URL}', 'ProductController@show')->name('producto.show');
Route::get('vaciar-carro','CartController@destroy')->name('cart.destroy');
Route::get('eliminar-item/{item}','CartController@deleteItem')->name('cart.deleteItem');

Route::get('carro-compras', 'CartController@index')->name('cart.index');
Route::get('carro-compras/login-checkout','CartController@loginCheckout')->name('login.transaction');
Route::match(['get', 'post'],'carro-compras/despacho', 'CartController@stepOne')->name('delivery.transaction');
Route::match(['get','post'],'carro-compras/pago', 'CartController@stepTwo')->name('pay.transaction');


Route::resource('carousel', 'CarouselHomeController');
Route::resource('category', 'CategoryController');
Route::resource('brand', 'BrandController');
Route::resource('product', 'ProductController');

//Webpay

Route::post('carro-compras/pagar', 'CartController@pay')->name('webpay.pagar');
Route::get('webpay/token', 'CartController@token')->name('webpay.token');
Route::post('webpay/voucher', 'CartController@voucher')->name('webpay.voucher');
Route::match(['get','post'],'carro-compras/confirmacion', 'CartController@confirmation')->name('webpay.final');
