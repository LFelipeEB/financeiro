<?php
/**
 * Created by PhpStorm.
 * User: lfelipeeb
 * Date: 13/02/18
 * Time: 16:02
 */

Route::get("/api/invocecreditcard/invoce/{creditCard}/{month}/{year}/", "InvoceCreditCardController@getApiInvoces");
Route::get("/api/invocecreditcard/balanceinvoce", "InvoceCreditCardController@getApiBalanceInvoceOpened");
