<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mess extends Model
{
    protected $table = 'mess';
	
    protected $fillable = [
         'type', 'seats_available','capacity',
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
