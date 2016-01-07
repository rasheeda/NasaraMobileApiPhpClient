<?php

require 'vendor/autoload.php';
use GuzzleHttp\Client;

class NasaraMobileApiClient {

	public $apiKey;
	public $baseUrl;
	public $baseUrlArguments;
	public $urlParams;
	public $baseUrlVersionTwo;

	protected $client;


	public function __construct($apiKey){

		$this->apiKey = $apiKey;
		$this->baseUrl = "http://sms.nasaramobile.com/api/";
		$this->baseUrlArguments = "?api_key=".$this->apiKey;
		$this->baseUrlVersionTwo = "http://sms.nasaramobile.com/api/v2";

		$this->client = new GuzzleHttp\Client(['base_uri' => $this->baseUrl]);;

	}

	public function sendSms($phone, $senderId, $message){

		$response = $this->client->request("GET", "", [

			"query" => [

				"api_key" => $this->apiKey,
				"phone" => $phone,
				"sender_id" => $senderId,
				"message" => $message
			]
		]);

		return $response->getBody();
	}

	public function checkCredit(){

		$response = $this->client->request('GET', 'accounts/credit', [

			'query' => ['api_key' => $this->apiKey]
		]);

		return $response->getBody();

	}

	public function sendSmsVersionTwo($phone, $senderId, $message){

		return "something here!";

	}

}
