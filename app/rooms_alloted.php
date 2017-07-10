<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rooms_alloted extends Model
{
   	protected $table = "rooms_alloted";
	
    protected $fillable = [
        'capacity','seats_available',
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
