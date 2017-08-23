<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\post;

class PostController extends Controller
{
    public function post(post $post){
    	// prikazujem post iz baze 
    	return view('user.post', compact('post'));
    }
}
