<?php

class UserController extends FEController 
{
	public function showUserProfile($username)
	{
		$userId = $this->user->id;
		if(!$userId) {
			App::abort(404);
		}

		// make sure there is a user object
		$user = User::find($userId);
		if(!$user) {
			App::abort(404);
		}

		$tempLookup = App::make('tempLookup');
		try {
			$temps = $tempLookup->getCityTemperatures($userId);
		} catch(\Exception $e) {
			App::abort(500, $e->getMessage());
		}
		
		$user = User::where('username', '=', $username)->first();
		if(!$user) {
			App::abort(404);
		}

		return View::make('profile', ['temps' => $temps])->with('username', $user->username);
	}
}