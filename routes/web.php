<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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



// Route::get('/', function () {
//     return view('welcome');
// });

// area pubblica
Route::get('/', 'GuestController@index')->name('guest.index');
Route::get('users/{user}', 'GuestController@showRestaurant')->name('guest.show');

//area privat
Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function () {
    Route::resource('foods', 'FoodController');
    Route::resource('users', 'UserController');
});
// home 
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//order controller
Route::get('guest/order/create', 'Guest\OrderController@createOrder')->name('guest.order.create');
Route::get('guest/order/{order}', 'Guest\OrderController@SuccessOrder')->name('guest.order.success');
Route::post('guest/order', 'Guest\OrderController@storeOrder')->name('guest.order.store');
