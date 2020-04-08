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

Route::group([
	'prefix' => 'accounts'
] , function(){
	Route::match(['get','post'],'/list','Admin\AccountController@list')->name('admin-accounts-list');
	Route::match(['get','post'],'/create','Admin\AccountController@create')->name('admin-accounts-create');
});

Route::get('/','Admin\HomeController@home')->name('admin-home');

