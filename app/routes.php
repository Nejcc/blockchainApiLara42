<?php


Route::get('/', ['as'=>'home', 'uses'=>'HomeController@index']);
Route::post('/transactions', ['as'=>'transactions.show', 'uses'=>'HomeController@get']);