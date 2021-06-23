<?php

use Illuminate\Support\Facades\Route;

Route::get('/','HomeController@getHome');
Route::group(['middleware'=>'auth'],function(){
	Route::get('catalog','CatalogController@getIndex')->name('catalog');
	Route::get('catalog/show/{id}','CatalogController@getShow')->name('showMovie');
	Route::post('catalog/create','CatalogController@postCreate');
	Route::get('catalog/create','CatalogController@getCreate');
	Route::get('catalog/edit/{id}','CatalogController@getEdit')->name('editMovie');
	Route::put('catalog/edit/{id}','CatalogController@putEdit');
	Route::put('catalgon/rent/{id}','CatalogController@putRent');
	Route::put('catalgon/rent/c/{id}','CatalogController@putRentC');
	Route::put('catalgon/return/{id}','CatalogController@putReturn');
	Route::delete('catalgon/delete/{id}','CatalogController@deleteMovie');
	Route::get('catalog/search/','CatalogController@searchImdb')->name('searchMovie');
	Route::get('show/moviec/{id}','CatalogController@showMovieC')->name('showMovieC');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
