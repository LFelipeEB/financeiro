<?php

Route::get("/category", "CategoryController@index");
Route::get("/category/create", "CategoryController@create");
Route::get("/category/{category}/edit", "CategoryController@edit");
Route::post("/category", "CategoryController@store");
Route::put("/category/{category}", "CategoryController@update");
Route::delete("/category/{category}", "CategoryController@destroy");