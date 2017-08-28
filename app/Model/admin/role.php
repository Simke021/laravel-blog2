<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    public function permissions(){

    	// Vise na vise veza izmedju role i permission-a
    	return $this->belongsToMany('App\Model\admin\Permission');
    }
}
