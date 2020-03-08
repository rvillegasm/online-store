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
Route::get('/watch/list/{categoryName}/{filter}', 'Customer\WatchController@list')->name("watch.list");
Route::get('/watch/show/{watchId}', 'Customer\WatchController@show')->name("watch.show");
Route::get('/cart', 'Customer\CartController@index')->name("cart.index");
Route::get('/cart/checkout', 'Customer\CartController@checkout')->name("cart.checkout");


/*
| ADMIN ROUTES
*/
Route::get('/admin/watch', 'Admin\WatchController@index')->name("admin.watch.index");
Route::get('/admin/watch/create', 'Admin\WatchController@create')->name("admin.watch.create");
Route::post('/admin/watch/store', 'Admin\WatchController@store')->name("admin.watch.store");

Route::get('/admin/category', 'Admin\CategoryController@index')->name("admin.category.index");

/*
| AUTHENTICATION ROUTES
*/
Auth::routes();

/*
| SESSION ROUTES
*/
Route::get('/session/put/{watchId}', 'SessionController@put')->name("session.put");