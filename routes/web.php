<?php

use Illuminate\Support\Facades\Route;
use App\Http\Requests\OrderRequest;

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
Auth::routes();

Route::get('/', 'AuthController@index');

Route::group([
    'name' => 'admin',
    'prefix' => 'admin',
    'middleware' =>'auth',
], function () {
  //frontend Product
  Route::get('/products', 'FrontEnd\AdminFrontEndController@allProducts');
  Route::get('/products/addproduct', 'FrontEnd\AdminFrontEndController@addProduct');
  Route::get('/products/update/{id}', 'FrontEnd\AdminFrontEndController@updateProduct');

  //frontend Order
  Route::get('/orders', 'FrontEnd\AdminFrontEndController@allOrders');
  Route::get('/orders/update/{id}', 'FrontEnd\AdminFrontEndController@updateOrder');

  //frontend User
  Route::get('/users', 'FrontEnd\AdminFrontEndController@allUsers');  
  Route::get('/users/update/{id}', 'FrontEnd\AdminFrontEndController@updateUser');
});


Route::group([
    'name' => 'customer',
    'prefix' => 'customer',
    'middleware' => 'auth'
], function () {
    Route::get('/products', 'FrontEnd\CustomerFrontEndController@allProduct')->name('customer.product');
    Route::get('/orders/{id}', 'FrontEnd\CustomerFrontEndController@productInfo')->name('customer.orderinfo');
    Route::post('/orders/process', 'OrderController@store')->name('customer.processorder');
});