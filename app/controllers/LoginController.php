<?php

class LoginController extends FEController
{

	public function login() 
	{
		if (Request::isMethod('post')) {
			$credentials = Input::only('username','password');

			if (Auth::attempt($credentials)) {
				return Redirect::route('profile.show', ['user' => $credentials['username']]);
			} else {
				return Redirect::back();
			}
		}
		
		return View::make('login');
	}

}