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
Route::get('/watch/{category}', 'WatchController@listWatches')->name("watch.list");
Route::get('/admin/watches', function () { //while the controllers are created
    return view('admin.watch.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
