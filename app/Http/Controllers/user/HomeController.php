<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\post;

class HomeController extends Controller
{
    public function index(){

    	// Utimam sve postove sa statusom 1 (published)
    	$posts = Post::where('status', 1)->get();
    	return view('user.home', compact('posts'));
    }
}
