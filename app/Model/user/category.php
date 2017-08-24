<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    // Veza izmedju taga i posta
    public function posts(){
    	// vise na vise veza izmedju tabela posts i categories/ paginacija 4 posta po strani 
    	return $this->belongsToMany('App\Model\user\post', 'category_posts')->orderBy('created_at', 'DESC')->paginate(4);
    }

    public function getRouteKeyName(){
    	// vise na vise veza izmedju tabela posts i categories
    	return 'slug';
    }
}
