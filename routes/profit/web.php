<?php

Route::get("/profit", "ProfitController@index");
Route::get("/profit/create", "ProfitController@create");
Route::get("/profit/{profit}/edit", "ProfitController@edit");
Route::post("/profit", "ProfitController@store");
Route::put("/profit/{profit}", "ProfitController@update");
Route::delete("/profit/{profit}", "ProfitController@destroy");