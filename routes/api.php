<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/categories/tree/{category?}', 'CategoryController@tree');
Route::get('/categories/list', 'CategoryController@list');
Route::get('/category/{category}', 'CategoryController@getCategory');
Route::get('/products/{category}', 'ProductController@getProductsByCategory');
Route::get('/product/{product}', 'ProductController@getProduct');
Route::post('/product/{product}', 'ProductController@storeProduct');
