<?php

namespace App;
use App\total;
use App\marks;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	 
	protected $table = "users";
	
    protected $fillable = [
         'email', 'password','name','year','dept','address','type','phone_no','city',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
	 
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	
	public function getmarks() {
		return $this->hasMany("App\marks","userid");
	}
	
	public function gettotal(){
		return $this->hasOne('App\total','usersid');
	}
	
}
