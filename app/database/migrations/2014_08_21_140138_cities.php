<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cities extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cities', function($newCities){
			$newCities->integer('id')->unique;
			$newCities->string('cityName');
			$newCities->string('latitude');
			$newCities->string('longitude');
			$newCities->string('country', 2);
			$newCities->primary('id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('cities');
	}

}
