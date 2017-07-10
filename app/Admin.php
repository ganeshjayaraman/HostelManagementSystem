<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
   	protected $table = 'admin';
	
    protected $fillable = [
         'email', 'password','name',
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
