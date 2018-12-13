<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('owners_name');
            $table->string('drivers_name');
            $table->string('mobile_no');
            $table->string('licence_no')->unique();
            $table->string('plate_no')->unique();
            $table->string('nationality');
            $table->string('state');
            $table->string('lga');
            $table->string('photograph');
            $table->text('car_description');
            $table->string('engine_no');
            $table->string('chassis_no');
            $table->string('password');
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
        Schema::dropIfExists('users');
    }
}
