<?php

Route::get('/user/{user}', 'UserController@show')->name('show_user');
Route::get('/user/{user}/edit', 'UserController@edit')->name('edit_user');
Route::put('/user/{user}', 'UserController@update')->name('update_user');