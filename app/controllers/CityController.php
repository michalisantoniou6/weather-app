<?php

class CityController extends FEController
{

	public function createCityUserRelation()
	{
		$allTheData = Input::get('allTheData');

		$newCity = $this->user->cities()->sync($allTheData);

		return $newCity;

	}

	public function selectCity()
	{		
		$userTerm = Input::get('term');

		$theCities = City::where('cityName', 'LIKE', '%'.$userTerm.'%')->get();

		foreach ($theCities as $city) {
			$results[] = [
				'id' => $city['id'],
				'name' => $city['cityName'],
				];
		}

		return Response::json($results);

	}

	public function fetchUserCities() 
	{
		$userCityIds = $this->user->cities()->orderBy('cityName', 'asc')->lists('cityName', 'id');

		return Response::json((array)$userCityIds);
	}
}