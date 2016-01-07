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

		return $this->genericGetRequest('accounts/credit');

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

		return $this->genericGetRequest('v2/contacts');

	}

	//get contacts
	public function fetchContactDetails($contactId){

		return $this->genericGetRequest('v2/contacts/'.$contactId);

	}

	//get groups
	public function fetchGroups(){

		return $this->genericGetRequest('v2/groups');

	}

	//get group details
	public function fetchGroupDetails($groupId){

		return $this->genericGetRequest('v2/contacts/'.$groupId);

	}

	//fetch account sms credit balance (version 2)
	public  function fetchAccountCredit(){

		return $this->genericGetRequest('v2/accounts/credit');
	}

	//function to handle all GET requests that require only an API key as a parameter
	private function genericGetRequest($URL){

		$response = $this->client->request('GET', $URL, [

			'query' => ['api_key' => $this->apiKey]
		]);

		return $response->getBody();
	}
}
