<?php

// User Routes
Route::group(['namespace' => 'user'], function(){
	Route::get('/', 'HomeController@index');
	Route::get('post', 'PostController@index')->name('post');
});

// Admin Routes
Route::group(['namespace' => 'admin'], function(){
	Route::get('admin/home', 'HomeController@index')->name('admin.home');

	// Post Routes
	Route::resource('admin/post', 'PostController');

	// Tag Routes
	Route::resource('admin/tag', 'TagController');

	// Category Routes
	Route::resource('admin/category', 'CategoryController');

	// User Routes
	Route::resource('admin/user', 'UserController');
});





