<?php

Route::middleware('auth')->group(function () {
	Route::get('/', 'PageController@index');
	Route::resource('theses', 'ThesisController');
});
	
Auth::routes();