<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

// Admin Login 
Route::get('admin/login', 'Admin\Auth\LoginController@showLoginForm');
Route::post('admin/login', 'Admin\Auth\LoginController@login');
// Route::get('admin/password/reset', 'Admin\AuthController@showForgotPasswordForm');
// Route::post('admin/password/reset', 'Admin\AuthController@sendOldPassword');

Route::group(['middleware' => ['admin:admin'], 'prefix' => 'admin'], function () {
    //Route::get('resetAllPasswords', 'Admin\CustomersController@resetAllPasswords');
    // Admin
    Route::get('/', 'Admin\AdminController@home');
    Route::get('logout', 'Admin\Auth\LoginController@logout');
    Route::get('reset_password', 'Admin\AdminController@showResetPasswordForm');
    Route::post('reset_password', 'Admin\AdminController@resetPassword');
});
