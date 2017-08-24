<?php

// User Routes
Route::group(['namespace' => 'user'], function(){
	Route::get('/', 'HomeController@index');
	Route::get('post/{post}', 'PostController@post')->name('post');

	// Route za tag
	Route::get('post/tag/{tag}', 'HomeController@tag')->name('tag');

	// Route za category
	Route::get('post/category/{category}', 'HomeController@category')->name('category');
});

// Admin Routes
Route::group(['namespace' => 'admin'], function(){

	Route::get('admin/home', 'HomeController@index')->name('admin.home');

	// User Routes
	Route::resource('admin/user', 'UserController');

	// Post Routes
	Route::resource('admin/post', 'PostController');

	// Tag Routes
	Route::resource('admin/tag', 'TagController');

	// Category Routes
	Route::resource('admin/category', 'CategoryController');

});





