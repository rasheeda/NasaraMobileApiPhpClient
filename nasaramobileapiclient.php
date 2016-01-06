<?php

class NasaraMobileApiClient {

	public $apiKey;
	public $baseUrl;
	public $baseUrlArguments;
	public $urlParams;


	public function __construct($apiKey){

		$this->apiKey = $apiKey;
		$this->baseUrl = "http://sms.nasaramobile.com/api";
		$this->baseUrlArguments = "?api_key=".$this->apiKey;
	}

	public function sendSms($phone, $senderId, $message){

		$this->urlParams = "&sender_id=".$senderId."&&phone=".$phone."&message=".urlencode($message);

		$response = file_get_contents($this->baseUrl.$this->baseUrlArguments.$this->urlParams);

		return $response;
	}

	public function checkCredit(){

		$this->baseUrl = $this->baseUrl."/accounts/credit";

		$response = file_get_contents($this->baseUrl.$this->baseUrlArguments);

		return $response;

	}

}
