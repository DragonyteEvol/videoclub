<?php

use Illuminate\Support\Facades\Route;

Route::get('login',function(){
	return view('auth.login');
});
Route::get('logout',function(){
	return view('welcome');
});
Route::get('/','HomeController@getHome');
Route::get('catalog','CatalogController@getIndex');
Route::get('catalog/show/{id}','CatalogController@getShow');
Route::get('catalog/create','CatalogController@getCreate');
Route::get('catalog/edit/{id}','CatalogController@getEdit');
