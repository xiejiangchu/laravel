<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

// Route::get('/', function () {
// 	return view('welcome');
// });

Route::get('/', 'HomeController@index');

Route::any('/wechat', 'WechatController@serve');

/***************    Site routes  **********************************/
Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');
Route::get('about', 'PagesController@about');

Route::controllers([
	'auth'     => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

/***************    Admin routes  **********************************/
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

	# Admin Dashboard
	Route::get('dashboard', 'Admin\DashboardController@index');

	# Users
	Route::get('user/data', 'Admin\UserController@data');
	Route::get('user/{user}/show', 'Admin\UserController@show');
	Route::get('user/{user}/edit', 'Admin\UserController@edit');
	Route::get('user/{user}/delete', 'Admin\UserController@delete');
	Route::resource('user', 'Admin\UserController');
});