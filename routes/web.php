<?php

Auth::routes();

Route::get('home', 'HomeController@index');

Route::get('/','ProductController@index');


