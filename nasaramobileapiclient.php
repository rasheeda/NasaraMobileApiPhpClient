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

		$this->urlParams = "&sender_id=".$senderId."&&phone=".$phone."&message=".urlencode($message);

		$response = file_get_contents($this->baseUrl.$this->baseUrlArguments.$this->urlParams);

		return $response;
	}

	public function checkCredit(){

		$this->baseUrl = $this->baseUrl."/accounts/credit";
		$response = $this->client->request('GET', 'accounts/credit', [
			'query' => ['api_key' => $this->apiKey]
		]);

		return $response->getBody();

	}

	public function sendSmsVersionTwo($phone, $senderId, $message){

		return "something here!";

	}

}
