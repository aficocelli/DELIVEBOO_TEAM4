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

Route::get('/search/types', 'Api\ApiController@searchTypes');

Route::get('/search/users', 'Api\ApiController@searchUsers');

Route::get('/select/types', 'Api\ApiController@selectTypes');

Route::get('/filterapi/{type}', 'Api\ApiController@filteredApi');

Route::get('/search/foods', 'Api\ApiController@searchFoods');

Route::get('/search/{name_restaurant}', 'Api\ApiController@filteredName');

Route::get('/search/selection/users', 'Api\ApiController@smallSelUsers');

