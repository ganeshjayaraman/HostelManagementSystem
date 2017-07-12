<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StudentsRoomInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_room_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('room_id');            
			$table->integer('student_id')->unsigned();					
			            
            $table->rememberToken();
            $table->timestamps();
			
			$table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
