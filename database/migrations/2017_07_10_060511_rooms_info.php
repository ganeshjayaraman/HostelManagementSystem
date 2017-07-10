<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RoomsInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('floor');            
			$table->string('block');
			$table->string('no_of_students');
			$table->string('block_warden');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
			Schema::drop('rooms_info');
    }
}
