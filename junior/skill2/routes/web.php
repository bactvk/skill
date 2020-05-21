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

Route::get('/',function(){
	return redirect()->route('admin-home');
});

Route::group([
	'prefix' => 'admin'
], function(){

	Route::match(['get','post'],'/login','Admin\LoginController@login')->name('admin-login');
	Route::match(['get','post'],'/signup','Admin\LoginController@signup')->name('admin-signup');
	Route::get('/logout','Admin\LoginController@logout')->name('admin-logout');

	Route::group([
		'middleware' => 'auth.admin'
	],function(){

		Route::get('/','Admin\HomeController@home')->name('admin-home');

		//Account
		Route::group([
		'prefix' => 'accounts'
		] , function(){
			Route::match(['get','post'],'/list','Admin\AccountController@list')->name('admin-accounts-list');
			Route::match(['get','post'],'/create','Admin\AccountController@create')->name('admin-accounts-create');
			Route::match(['get','post'],'/edit/{id}','Admin\AccountController@edit')->name('admin-accounts-edit');
			Route::get('/delete/{id}','Admin\AccountController@delete')->name('admin-accounts-delete');

			Route::get('/export','Admin\AccountController@export')->name('admin-accounts-export');
			Route::get('/printPdf','Admin\AccountController@printPdf')->name('print-pdf');

			Route::get('/getAllAccount','Admin\AccountController@getAll')->name('get-all-account');

		});

		// Message
		Route::group([
			'prefix' => 'messages'
		],function(){
			Route::match(['get','post'],'/list','Admin\MessageController@list')->name('admin-messages-list');
			Route::match(['get','post'],'/create','Admin\MessageController@create')->name('admin-messages-create');
			Route::get('/view/{id}','Admin\MessageController@view')->name('admin-messages-view');
			Route::get('/delete/{id}','Admin\MessageController@delete')->name('admin-messages-delete');
		});

	});
});

Route::post('/language','LanguageController@changeLanguage');
Route::get('refresh_captcha', 'Admin\HomeController@refreshCaptcha')->name('refresh_captcha');

Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
    ->name('ckfinder_browser');
Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
    ->name('ckfinder_connector');
