<?php


namespace App\Commun;


class GoogleMaps
{
	public function recupererGoogleMapsAdresse($adresse) {
		$curl = curl_init();
		$url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . str_replace(" ", "+", $adresse) ."&key=AIzaSyAZwFBQDXkJtIr5ZGpmXKQpHcbd025gyWU&";
		curl_setopt_array($curl, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30000,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_HTTPHEADER => array(
				// Set here requred headers
				"content-type: application/json",
			),
		));
		$response = curl_exec($curl);
		curl_close($curl);
		$json = json_decode($response, true);
		//print_r($json);
		return $json;

	}
}