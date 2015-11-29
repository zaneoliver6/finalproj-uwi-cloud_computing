<?php

//Main "Home" screen
Route::get('/','Dashboard@index');

//Authenication Routes
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/login', 'Auth\AuthController@getLogout');

//Registration Routes
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::get('auth/register', 'Auth\AuthController@postRegister');
