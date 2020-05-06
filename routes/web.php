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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login','PageController@index');
Route::get('/admin','PageController@create');
Route::get('/addproduct','PageController@addproduct');
Route::post('/saveproduct','PageController@store');
Route::get('/orderlist','PageController@orderlist');
Route::get('/orderlist','OrderController@foodorderslist');
Route::post('/dologin','PageController@dologin');
Route::post('/dologin','PageController@dologin');
Route::get('/logout','PageController@logout');
