<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class students_mess_info extends Model
{
   	protected $table = "students_mess_info";
	
    protected $fillable = [
         'student_id','mess_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
