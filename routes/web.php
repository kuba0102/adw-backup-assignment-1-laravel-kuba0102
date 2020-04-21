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
    return view('index/index');
});

//Route::get('home', 'StaffController@index');

Route::get('login', [ 'as' => 'login', 'uses' => 'AuthentController@loginForm']);
Route::post('login', [ 'as' => 'login', 'uses' => 'AuthentController@login']);
Route::get('logout', [ 'as' => 'logout', 'uses' => 'AuthentController@logout']);
Route::get('adduser-form', 'StaffController@addUserForm');
Route::post('add-user', 'StaffController@addUser');
Route::get('home', 'CarPartController@getAllParts');
Route::get('search-parts', 'CarPartController@searchParts');
Route::post('filter', 'CarPartController@filter');
Route::get('filter','AjaxController@filter');
Route::get('basket','AjaxController@addBasket');
Route::get('load-basket','AjaxController@loadBasket');
Route::get('remove-basket','AjaxController@removeBasket');
Route::get('checkout','OrderController@getCheckout');
Route::post('checkout','OrderController@addOrder');
Route::get('order','OrderController@getOrders');
Route::get('order-details','OrderController@getOrderDetails');
Route::post('order-remove','OrderController@removeOrder');
Route::get('users','StaffController@allUsers');
Route::get('user-details','StaffController@getUserDetails');
Route::post('edit-user','StaffController@updateUser');
