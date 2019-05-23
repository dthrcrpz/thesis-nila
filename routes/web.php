<?php

Route::middleware('auth')->group(function () {
	Route::get('download-thesis/{thesis}', 'ThesisController@download');
	Route::resource('users', 'UserController');
	Route::get('/', 'PageController@index');
	Route::resource('theses', 'ThesisController');
	Route::get('change-password', 'PageController@changePassword');
	Route::patch('change-password', 'UserController@changePassword');
});
	
Auth::routes();