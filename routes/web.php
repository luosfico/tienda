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
Route::get('/productos', 'HomeController@products')->name('productos');
Route::get('/account', 'HomeController@account')->name('account')->middleware('verified');
Route::resource('carousel', 'CarouselHomeController');
Route::resource('productos', 'ProductController');

