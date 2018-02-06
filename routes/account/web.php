<?php

Route::get('/account', 'AccountController@index');
Route::get('/account/create', 'AccountController@create');
Route::get('/account/{account}/edit', 'AccountController@edit');
Route::post('/account', 'AccountController@store');
Route::put('/account/{account}', 'AccountController@update');
Route::delete('/account/{account}', 'AccountController@destroy');