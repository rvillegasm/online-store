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
Route::get('/locale/{locale}', 'HomeController@locale')->name("home.locale");
Route::post('/search', 'HomeController@search')->name("home.search");

/*
| CUSTOMER ROUTES
*/
Route::get('/watch/list/{categoryName}/{filter}', 'Customer\WatchController@list')->name("watch.list");
Route::get('/watch/show/{watchId}', 'Customer\WatchController@show')->name("watch.show");
Route::get('/cart', 'Customer\CartController@index')->name("cart.index");
Route::get('/cart/checkout', 'Customer\CartController@checkout')->name("cart.checkout");
Route::post('/cart/process', 'Customer\CartController@process')->name("cart.process");
Route::post('/watch/show/{watchId}/storeComment', 'Customer\CommentController@store')->name("comment.store");

Route::get('/order', 'Customer\OrderController@index')->name("order.index");
Route::get('/order/show/{orderId}', 'Customer\OrderController@show')->name("order.show");

/*
| ADMIN ROUTES
*/
Route::get('/admin/watch', 'Admin\WatchController@index')->name("admin.watch.index");
Route::get('/admin/watch/create', 'Admin\WatchController@create')->name("admin.watch.create");
Route::post('/admin/watch/store', 'Admin\WatchController@store')->name("admin.watch.store");
Route::delete('/admin/watch/delete/{id}', 'Admin\WatchController@delete')->name("admin.watch.delete");
Route::get('/admin/watch/edit/{id}', 'Admin\WatchController@edit')->name("admin.watch.edit");
Route::put('/admin/watch/update', 'Admin\WatchController@update')->name("admin.watch.update");
Route::get('/admin/watch/export/', 'Admin\WatchController@export')->name("admin.watch.export");

Route::get('/admin/category', 'Admin\CategoryController@index')->name("admin.category.index");
Route::get('/admin/category/create', 'Admin\CategoryController@create')->name("admin.category.create");
Route::post('/admin/category/store', 'Admin\CategoryController@store')->name("admin.category.store");
Route::delete('/admin/category/delete/{id}', 'Admin\CategoryController@delete')->name("admin.category.delete");
Route::get('/admin/category/edit/{id}', 'Admin\CategoryController@edit')->name("admin.category.edit");
Route::put('/admin/category/update', 'Admin\CategoryController@update')->name("admin.category.update");

Route::get('/admin/order', 'Admin\OrderController@index')->name("admin.order.index");
Route::get('/admin/order/show/{orderId}', 'Admin\OrderController@show')->name("admin.order.show");
Route::post('/admin/order/update/{orderId}', 'Admin\OrderController@update')->name("admin.order.update");

/*
| AUTHENTICATION ROUTES
*/
Auth::routes();

/*
| GOOGLE LOGIN ROUTES
*/
Route::get('auth/google/redirect', 'Auth\SocialAuthGoogleController@redirect')->name("google.redirect");
Route::get('auth/google/callback', 'Auth\SocialAuthGoogleController@callback')->name("google.callback");


/*
| SESSION ROUTES
*/
Route::post('/session/put/{watchId}', 'SessionController@put')->name("session.put");
Route::post('/session/delete/{watchId}', 'SessionController@delete')->name("session.delete");