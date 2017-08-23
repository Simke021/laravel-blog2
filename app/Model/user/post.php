<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    // Veza izmedju posta i taga
    public function tags(){

    	// vise na vise veza izmedju tabela posts i tags
    	return $this->belongsToMany('App\Model\user\tag', 'post_tags')->withTimestamps();
    }

    // Veza izmedju posta i kategorije
    public function categories(){

    	// vise na vise veza izmedju tabela posts i categories
    	return $this->belongsToMany('App\Model\user\category', 'category_posts')->withTimestamps();
    }
}
