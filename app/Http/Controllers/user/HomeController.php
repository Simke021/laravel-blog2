<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\post;

class HomeController extends Controller
{
    public function index(){

    	// Utimam sve postove sa statusom 1 (published), sa paginate-om od 4 posta po strani
    	$posts = Post::where('status', 1)->paginate(5);
    	return view('user.home', compact('posts'));
    }
}
