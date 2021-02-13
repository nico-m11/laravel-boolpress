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



Auth::routes();
Route::get('/', 'PostController@index');

Route::get('home', 'PostController@index');

Route::resource('post', 'PostController');

//Route::prefix('free-zone')->group(function(){
 //   Route::get('/', 'PostController@guest')->name('freeZone');
//});

//Route::prefix('restricted-zone')->middleware('auth')->group(function(){
//    Route::get('/', 'PostController@logged')->name('restrictedZone');
//});