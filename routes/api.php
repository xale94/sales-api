<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/shops', 'App\Http\Controllers\ShopController@index');
Route::get('/shop/{id}', 'App\Http\Controllers\ShopController@show');
Route::post('/shop', 'App\Http\Controllers\ShopController@create');
Route::delete('/shop/{id}', 'App\Http\Controllers\ShopController@destroy');