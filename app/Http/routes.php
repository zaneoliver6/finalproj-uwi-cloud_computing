<?php

//Main "Home" screen
Route::get('/', function (){
  return view('welcome');
});

//Main Dashboard page
Route::get('/dashboard', 'DashboardController@index');

//Authenication Routes
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

//Registration Routes
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
