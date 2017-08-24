<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\post;
use App\Model\user\tag;
use App\Model\user\category;

class HomeController extends Controller
{
    public function index(){

    	// Uzimam sve postove sa statusom 1 (published), sa paginate-om od 4 posta po strani
    	$posts = Post::where('status', 1)->orderBy('created_at', 'DESC')->paginate(5);
    	return view('user.home', compact('posts'));
    }

    public function tag(tag $tag){

    	$posts = $tag->posts();
    	return view('user.home', compact('posts'));
    }

    public function category(category $category){

    	$posts = $category->posts();
    	return view('user.home', compact('posts'));
    	
    }
}
