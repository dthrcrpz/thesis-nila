<?php

Route::middleware('auth')->group(function () {
	Route::get('download-thesis/{thesis}', 'ThesisController@download');
	Route::resource('users', 'UserController');

	Route::get('change-password', 'PageController@changePassword');
	Route::patch('change-password', 'UserController@changePassword');
});

Route::get('/', 'PageController@index');
Route::resource('theses', 'ThesisController');
	
Auth::routes();