<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($newUsers){ 
			$newUsers->increments('id');
			$newUsers->string('email')->unique;
			$newUsers->string('username',100)->unique;
			$newUsers->string('password',255);
			$newUsers->string('remember_token',100);
			$newUsers->timestamps();
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
