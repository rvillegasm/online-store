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

Route::get('/', 'HomeController@index')->name("home.index");

/*
| CUSTOMER ROUTES
*/
Route::get('/watch/{categoryId}', 'Customer\WatchController@list')->name("watch.list");

/*
| ADMIN ROUTES
*/
Route::get('/admin/watch', 'Admin\WatchController@index')->name("admin.watch.index");

Auth::routes();
