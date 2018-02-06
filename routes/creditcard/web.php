<?php

Route::get('/creditcard', "CreditCardController@index");
Route::get('/creditcard/create', "CreditCardController@create");
Route::get('/creditcard/{creditCard}/edit', "CreditCardController@edit");
Route::post('/creditcard', "CreditCardController@store");
Route::put('/creditcard/{creditcard}', "CreditCardController@update");
Route::delete('/creditcard/{creditcard}', "CreditCardController@destroy");