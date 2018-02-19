<?php

Route::get("/invocecreditcard", "InvoceCreditCardController@index");
Route::get("/invocecreditcard/{creditCard}/{month}/{year}", "InvoceCreditCardController@show");
Route::get("/invocecreditcard/create", "InvoceCreditCardController@create");
Route::post("/invocecreditcard", "InvoceCreditCardController@store");
