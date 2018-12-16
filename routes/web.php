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


//User routes
Route::get('/', 'UserController@index')->name('index');
Route::get('/login', 'UserController@login')->name('login');


//Admin routes
// Route::prefix('/admin')->group(function(){

// });

Route::get('/admin', 'AdminController@showLogin')->name('admin.login');
Route::post('/admin/login', 'AdminController@loginSubmit')->name('admin.login.submit');
Route::get('/admin/home', 'Auth\AdminController@showHome')->name('admin.home');
Route::get('/admin/logout', 'Auth\AdminController@logout')->name('admin.logout');


// Route::post('/admin/driver/find','Auth\AdminController@searchDriver')->name('admin.driver.find');


Route::get('/admin/driver/add', 'Auth\AdminController@showAddDriver')->name('admin.driver.show');
Route::post('/admin/driver/add', 'Auth\AdminController@postAddDriver')->name('admin.driver.add');
Route::get('/admin/driver/update', 'Auth\AdminController@showUpdateDriver')->name('admin.driver.update');

Route::post('/admin/driver/find', 'Auth\AdminController@searchDriver')->name('admin.driver.find');
Route::get('/admin/driver/find', 'Auth\AdminController@showFoundDriver')->name('admin.driver.find.show');

//Search for driver using plate no record 
Route::get('/admin/payments', 'Auth\AdminController@showPayments')->name('admin.payments.show');
Route::get('/admin/payments/history', 'Auth\AdminController@showPaymentHistory')->name('admin.payments.history');

//Payment routes