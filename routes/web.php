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
Route::resource('carts', 'App\Http\Controllers\CartController')->except(['show']);

//Route::get('/', 'App\Http\Controllers\CartController@home')->name('home');


Route::get('/', function () {
    return view('welcome');
});
