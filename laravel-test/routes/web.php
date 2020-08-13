<?php

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
    return view('users/welcome');
});

Route::get('/sample/model', 'MyController@model');

Route::get('/users/list','MyController@user_list');

Route::post('/users/trade','MyController@trade');

Route::get('/users/orderConfirm','MyOrderController@orderConfirm');

// Route::post( '/users/trade',function () {
//     return view('users/trade');
// });orderConfirm