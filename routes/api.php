<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'AuthController@LoginPost')->name('postlogin');

Route::post('/admin/products/store', 'ProductController@store')->name('products.store');
Route::delete('/admin/products/delete/{id}', 'ProductController@destroy')->name('products.delete');
Route::put('/admin/products/update/{id}', 'ProductController@update')->name('products.update');

Route::delete('/admin/orders/delete/{id}', 'OrderController@destroy')->name('orders.delete');
Route::put('/admin/orders/update/{id}', 'OrderController@update')->name('orders.update');

Route::delete('/admin/users/delete/{id}', 'UserController@destroy')->name('users.delete');
Route::put('/admin/users/update/{id}', 'UserController@update')->name('users.update');

Route::get('/products/datatable', 'ProductController@index')->name('products.datatable');
Route::get('/orders/datatable', 'OrderController@index')->name('orders.datatable');
Route::get('/users/datatable', 'UserController@index')->name('users.datatable');
