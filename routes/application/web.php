<?php

Route::get('/application', 'ApplicationController@index');
Route::get('/application/create', 'ApplicationController@create');
Route::get('/application/{application}/edit', 'ApplicationController@edit');
Route::post('/application', 'ApplicationController@store');
Route::put('/application/{application}', 'ApplicationController@update');
Route::delete('/application/{application}', 'ApplicationController@destroy');
