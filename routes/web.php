<?php

Auth::routes();

Route::get('home', 'HomeController@index');

Route::get('/','ProductController@index');

Route::get('products/create','ProductController@create')->middleware('auth');

Route::post('products','ProductController@store')->middleware('auth');

Route::get('products/{id}','ProductController@show')->name('products');

Route::post('products/buy',"ProductController@buy");

Route::get('profile','UserController@index');


