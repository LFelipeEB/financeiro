<?php

Route::get("/expense", "ExpenseController@index");
Route::get("/expense/create", "ExpenseController@create");
Route::get("/expense/{expense}/edit", "ExpenseController@edit");
Route::post("/expense", "ExpenseController@store");
Route::put("/expense/{expense}", "ExpenseController@update");
Route::delete("/expense/{expense}", "ExpenseController@destroy");