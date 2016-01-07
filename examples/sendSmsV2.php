<?php

require_once('../nasaramobileapiclient.php');

$phoneNumbers = "233xxxxxxxxx, 24342xxxxxx";
$groups = "";
$contactIds = "";
$senderId = "NTesting";
$message = "hey there, this is a test message!";

$smsApi = new NasaraMobileApiClient("9EEPC38Eyf9N6Mc8beMEH");
$response = $smsApi->sendSmsVersionTwo($phoneNumbers, $senderId, $message);

$response = json_decode($response);


