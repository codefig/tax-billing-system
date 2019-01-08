<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('users', function (Blueprint $table) {
			$table->increments('id');
			$table->string('drivers_name');
			$table->string('owners_name')->nullable();
			$table->string('mobile_no')->nullable();
			$table->string('licence_no')->nullable()->unique();
			$table->string('plate_no')->nullable()->unique();
			$table->string('nationality')->nullable();
			$table->string('state')->nullable();
			$table->string('lga')->nullable();
			$table->string('photograph')->nullable();
			$table->text('car_description')->nullable();
			$table->string('engine_no')->nullable();
			$table->string('chassis_no')->nullable();
			$table->string('password')->nullable();
			$table->integer('is_updated')->nullable();
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('users');
	}
}
