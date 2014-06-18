<?php

require_once('../nasaramobileapiclient.php');

$phone = "233244209193";
$senderId = "NTesting";
$message = "hey there, this is a test messge!";

$smsApi = new NasaraMobileApiClient;
$result = $smsApi->sendSms($phone, $senderId, $message);

print($result);


