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
Route::get('carro-compras', 'CartController@index')->name('cart.index');
Route::get('productos/{URL}', 'ProductController@show')->name('producto.show');
Route::delete('eliminar-carro','CartController@destroy')->name('cart.destroy');
Route::resource('carousel', 'CarouselHomeController');
Route::resource('category', 'CategoryController');
Route::resource('brand', 'BrandController');
Route::resource('product', 'ProductController');

