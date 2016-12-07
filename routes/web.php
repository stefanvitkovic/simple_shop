<?php

Auth::routes();

Route::get('home', 'HomeController@index');

Route::get('/','ProductController@index');

Route::get('products/create','ProductController@create');

Route::post('products','ProductController@store');

Route::get('products/{id}','ProductController@show');

Route::post('products/buy',"ProductController@buy");




