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
Route::post('/login', 'UserController@loginSubmit')->name('login.post');
Route::get('/signup', 'UserController@showSignup')->name('signup');
Route::post('/signup', 'UserController@signupSubmit')->name('signup.post');
Route::get('/home', 'Auth\UserController@home')->name('user.home');
Route::get('/logout', 'Auth\UserController@logout')->name('user.logout');
//Admin routes
// Route::prefix('/admin')->group(function(){
// });

Route::get('/admin', 'AdminController@showLogin')->name('admin.login');
Route::post('/admin/login', 'AdminController@loginSubmit')->name('admin.login.submit');
Route::get('/admin/home', 'Auth\AdminController@showHome')->name('admin.home');
Route::get('/admin/logout', 'Auth\AdminController@logout')->name('admin.logout');

// Route::post('/admin/driver/find','Auth\AdminController@searchDriver')->name('admin.driver.find');

Route::get('/admin/driver/all', 'Auth\AdminController@showAllDrivers')->name('admin.driver.showall');
Route::get('/admin/driver/add', 'Auth\AdminController@showAddDriver')->name('admin.driver.show');
Route::post('/admin/driver/add', 'Auth\AdminController@postAddDriver')->name('admin.driver.add');

Route::get('/admin/driver/update', 'Auth\AdminController@showUpdateDriver')->name('admin.driver.showUpdate');
Route::post('/admin/driver/update', 'Auth\AdminController@updateDriver')->name('admin.driver.updateForm');

//Route to search a driver using his plate-number;
Route::post('/admin/driver/find', 'Auth\AdminController@searchDriver')->name('admin.driver.find');

//Search for driver using plate no record
Route::get('/admin/payments', 'Auth\AdminController@showPayments')->name('admin.payments.show');
Route::post('/admin/payments', 'Auth\AdminController@postPayments')->name('admin.payments.add');

Route::get('/admin/payments/history', 'Auth\AdminController@showPaymentHistory')->name('admin.payments.history');
Route::post('/admin/payments/history', 'Auth\AdminController@findPaymentHistory')->name('admin.payments.history.find');

//Payment routes