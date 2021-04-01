<?php

use Illuminate\Support\Facades\Route;

Route::get('/','HomeController@getHome');
Route::group(['middleware'=>'auth'],function(){
Route::get('catalog','CatalogController@getIndex');
Route::get('catalog/show/{id}','CatalogController@getShow');
Route::post('catalog/create','CatalogController@postCreate');
Route::get('catalog/edit/{id}','CatalogController@getEdit');
Route::put('catalog/edit/{id}','CatalogController@putEdit');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
