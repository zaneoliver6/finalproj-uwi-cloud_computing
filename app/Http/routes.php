<?php

//"Home" screen
Route::get('/', function (){
  return view('welcome');
});

//Main Dashboard page
Route::get('/dashboard', 'DashboardController@index');

//Authenication Routes
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

//Registration Routes
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//Customer Management Routes
Route::get('customers/{active?}', 'CustomerController@index');
Route::get('customer/view/{id}', 'CustomerController@view');
Route::get('customer/edit/{id}', 'CustomerController@edit');
Route::post('customer/update/{id}','CustomerController@update');
Route::get('customer/toggleStatus/{id}', 'CustomerController@toggleStatus');
Route::get('customer/add', 'CustomerController@add');
Route::post('customer/create' , 'CustomerController@create');
Route::get('/customer/email/{id}','CustomerController@email');
Route::post('/customer/send/{id}','CustomerController@send');

//Subscription Management Routes
Route::get('/subscription/scaleup/{amt}', 'SubscriptionController@scaleUp');
Route::get('/subscription/scaledown/{amt}', 'SubscriptionController@scaleDown');
Route::get('/subscription/change/{type}', 'SubscriptionController@change');


//Billing
Route::get('/bill/current' , 'BillingController@current');


//Customer section
Route::get('/dashboard/customer', 'CustomerDashboardController@index');
?>
