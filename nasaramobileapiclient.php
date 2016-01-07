<?php

require 'vendor/autoload.php';
use GuzzleHttp\Client;

class NasaraMobileApiClient {

	public $apiKey;
	public $baseUrl;
	public $baseUrlArguments;
	public $urlParams;

	protected $client;


	public function __construct($apiKey){

		$this->apiKey = $apiKey;
		$this->baseUrl = "http://sms.nasaramobile.com/api/";
		$this->baseUrlArguments = "?api_key=".$this->apiKey;

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

	public function sendSmsVersionTwo($phoneNumbers, $senderId, $message, $groups = null, $contactIds = null){

		$response = $this->client->request("POST", "v2/sendsms", [

			"query" => [

				"api_key" => $this->apiKey,
				"phone_numbers" => urlencode($phoneNumbers),
				"sender_id" => $senderId,
				"message" => $message
			]
		]);

		return $response->getBody();

	}

	//get contacts
	public function fetchContacts(){

		$response = $this->client->request('GET', 'v2/contacts', [

			'query' => ['api_key' => $this->apiKey]
		]);

		return $response->getBody();

	}


	//get contact details
	//get contacts
	public function fetchContactDetails($contactId){

		$response = $this->client->request('GET', 'v2/contacts/'.$contactId, [

			'query' => ['api_key' => $this->apiKey]
		]);

		return $response->getBody();

	}

	//get groups


	//get group details

}
