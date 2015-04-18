<?php

class TemperatureLookup 
{
	
	public function getCityTemperatures($userId) {

		// Get an array of city IDs
		$cities = User::find($userId)->cities()->lists('id'); 

		//prepare the request
		$url = "http://api.openweathermap.org/data/2.5/group";

		$queryString = http_build_query([
			'units' => 'metric',
			'id' => implode(',', $cities),
		]);

		//put it all together
		$requestURL = $url . '?' . $queryString;

		$cityList = [];
		$temperatureList = [];

		$response = file_get_contents($requestURL);

		if($response === false) {
			throw new \Exception('Could not decode JSON.');
		} else {
			$json = json_decode( $response, true );
			
			$jsonSize = $json['cnt'];

			for ($i = 0; $i < $jsonSize; $i++) {
				$cityList[$i] = $json['list'][$i]['name'];
				$temperatureList[$i] = $json['list'][$i]['main']['temp'];
			}
		}

		return array($cityList, $temperatureList);
	}
}
