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

Route::match(['get','post'],'/','AccountController@index')->name('account');
Route::match(['get','post'],'/add','AccountController@add')->name('account_add');
Route::match(['get','post'],'/edit/{id}','AccountController@edit')->name('account_edit');
Route::get('/delete/{id}','AccountController@delete')->name('account_delete');

Route::get('/accounts/get-list-account','AccountController@getListAccounts')->name('getListAccounts');

Route::post('/language','LanguageController@changeLanguage')->name('changeLanguage');