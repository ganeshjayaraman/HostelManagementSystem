<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RoomsAlloted extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms_alloted', function (Blueprint $table) {
            $table->increments('id');
            $table->string('capacity');            
			$table->string('seats_available');
			
			$table->integer('room_id')->unsigned();					
			
            $table->rememberToken();
            $table->timestamps();			
			
			$table->foreign('room_id')->references('id')->on('rooms_info')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rooms_alloted');
    }
}
