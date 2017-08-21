<?php

Route::get('/', function () {
    return view('user.home');
});

Route::get('post', function(){
	return view('user.post');
})->name('post');
