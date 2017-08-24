<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    // Veza izmedju taga i posta
    public function posts(){
    	// vise na vise veza izmedju tabela posts i tags
    	return $this->belongsToMany('App\Model\user\post', 'post_tags')->orderBy('created_at', 'DESC')->paginate(4);
    }

    public function getRouteKeyName(){
    	// vise na vise veza izmedju tabela posts i categories
    	return 'slug';
    }
}
