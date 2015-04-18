<?php

class SignUpController extends FEController 
{
	public function register() 
	{	
		if (Request::isMethod('post')) {
			$user = new User;
			$user->email = Input::get('email');
			$user->username = Input::get('username');
			$user->password = Input::get('password');
			$validate = $user->save();

			if ($validate) {
				return Redirect::to('login')->with('message','Registration successful.');
			} else {
				return Redirect::to('signup')->withErrors($user->errors()->all());
			}
		}
			
		return View::make('signup');
	}
}