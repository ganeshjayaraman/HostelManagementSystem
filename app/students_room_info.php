<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class students_room_info extends Model
{
    protected $table = "students_room_info";
	
    protected $fillable = [
         'student_id','room_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
	 
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	public function getBack()
    {
        return $this->belongsTo('App\User', 'student_id');
    }
	
}
