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


//area privata
Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function () {
    Route::resource('foods', 'FoodController');
    Route::resource('users', 'UserController');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('guest', 'Guest\OrderController@showOrder')->name('guest.order.show');

