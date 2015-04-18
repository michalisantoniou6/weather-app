<?php

class City extends Eloquent {

	/***
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'cities';

	public $timestamps = false;
	
	public function users() {
		return $this->belongsToMany('User');
	}
}