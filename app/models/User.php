<?php

use LaravelBook\Ardent\Ardent;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Ardent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/**
	 * Validation rules for SignUp form
	 */
	public static $rules = array(
	    'username'              => 'required|between:4,16|unique:users',
	    'email'                 => 'required|email|unique:users',
	    'password'              => 'required|alpha_num|between:4,8',
  	);

	/**
	 * Hash the password before storing it in DB
	 */
  	public function beforeSave() 
  	{
  		if($this->isDirty('password')) {
  			$this->password = Hash::make($this->password);
  		}
  	}

	public function cities() 
	{
		return $this->belongsToMany('City');
	}
}
