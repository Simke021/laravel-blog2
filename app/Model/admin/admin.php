<?php

namespace App\Model\admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class admin extends Authenticatable
{
    use Notifiable;

    // Copy/paste sa laravel dokumentacije
    public function getNameAttribute($value){
        // Prvo veliko slovo
        return ucfirst($value);
    }

    public function roles(){
    	// Meny to many veza izmedju user-a i role-ova
    	return $this->belongsToMany('App\Model\admin\role');
    }

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
