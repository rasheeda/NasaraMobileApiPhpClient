<?php

require_once('../nasaramobileapiclient.php');

$phone = "233244209193";
$senderId = "Testing";
$message = "hey there, this is a test!";

$smsApi = new NasaraMobileApiClient;
$smsApi->sendSms($phone, $senderId, $message);


