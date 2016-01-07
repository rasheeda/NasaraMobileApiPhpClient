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

		$queryData = [

			"api_key" => $this->apiKey,
			"phone" => $phone,
			"sender_id" => $senderId,
			"message" => $message
		];

		return $this->genericGetRequest("", $queryData);
	}

	public function checkCredit($queryData = null){

		return $this->genericGetRequest('accounts/credit', $queryData);

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
	public function fetchContacts($queryData = null){

		return $this->genericGetRequest('v2/contacts', $queryData);

	}

	//get contacts
	public function fetchContactDetails($queryData = null, $contactId){

		return $this->genericGetRequest('v2/contacts/'.$contactId, $queryData);

	}

	//get groups
	public function fetchGroups($queryData = null){

		return $this->genericGetRequest('v2/groups', $queryData);

	}

	//get group details
	public function fetchGroupDetails($queryData = null, $groupId){

		return $this->genericGetRequest('v2/contacts/'.$groupId, $queryData);

	}

	//fetch account sms credit balance (version 2)
	public  function fetchAccountCredit($queryData = null){

		return $this->genericGetRequest('v2/accounts/credit', $queryData);
	}

	//function to handle all GET requests that require only an API key as a parameter
	private function genericGetRequest($URL, $queryData ){

		$response = $this->client->request('GET', $URL, [

			'query' => ["api_key" => $this->apiKey],
			'query' => $queryData
		]);

		return $response->getBody();
	}
}
