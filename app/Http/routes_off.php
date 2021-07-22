<?php

Route::get('/', 'calendarioController@tv');
Route::get('admin', 'adminController@sistemaOffline');

Route::get('login', 'adminController@sistemaOffline');
Route::get('logout', 'Auth\AuthController@getLogout');

//Registration Routes...
Route::get('register', 'adminController@getRegister');
Route::post('register', 'adminController@postRegister');


// Password Reset Routes...
//Route::get('password/reset', 'Auth\PasswordController@getEmail');
//Route::post('password/email', 'Auth\PasswordController@postEmail');
//Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
//Route::post('password/reset', 'Auth\PasswordController@postReset');