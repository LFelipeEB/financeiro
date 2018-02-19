<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

include_once 'user/web.php';
include_once 'account/web.php';
include_once 'creditcard/web.php';
include_once 'application/web.php';
include_once 'profit/web.php';
include_once 'expense/web.php';
include_once 'category/web.php';
include_once 'invoce_credit_card/web.php';
include_once 'invoce_credit_card/api.php';
