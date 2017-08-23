<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    // Veza izmedju taga i posta
    public function posts(){
    	// vise na vise veza izmedju tabela posts i categories
    	return $this->belongsToMany('App\Model\user\post', 'category_post');
    }
}
