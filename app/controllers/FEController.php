<?php

/*
 *	FEController is used to make the userId available to all newly-created objects.
 *	Use $this->user to get the userId.
 *
 *  http://en.wikipedia.org/wiki/Law_of_Demeter
 */

class FEController extends BaseController
{
	protected $user;

	public function __construct()
	{
		$this->user = Auth::user();
	}
}