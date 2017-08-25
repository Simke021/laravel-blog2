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

	// Roles Routes
	Route::resource('admin/role', 'RoleController');

	// Post Routes
	Route::resource('admin/post', 'PostController');

	// Tag Routes
	Route::resource('admin/tag', 'TagController');

	// Category Routes
	Route::resource('admin/category', 'CategoryController');

	// Admin Auth Routes
	Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
	Route::post('admin-login', 'Auth\LoginController@login');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
