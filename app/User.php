<?php

namespace App;
use App\students_room_info;

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
         'email', 'password','name','year','dept','address','type','phone_no','city','is_alloted',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
	 
    protected $hidden = [
        'password', 'remember_token',
    ];
				
	public function getInfo()
    {
        return $this->hasOne("App\students_room_info", 'student_id');
    }
}
