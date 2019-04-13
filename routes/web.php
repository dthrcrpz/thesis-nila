<?php

Route::get('/', 'PageController@index');
Route::resource('theses', 'ThesisController');
Auth::routes();