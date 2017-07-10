<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rooms_info extends Model
{
    protected $table = "rooms_info";
	
    protected $fillable = [
        'no_of_students', 'floor', 'block','block_warden',
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
