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
    return view('welcome');
});


Route::get('/login', function(){
	return view('login');
});


Route::prefix('/admin')->group(function(){

Route::get('/', 'AdminController@showLogin')->name('admin.login');
Route::post('/login', 'AdminController@loginSubmit')->name('admin.login.submit');
Route::get('/home', 'Auth\AdminController@showHome')->name('admin.home');
	
});
