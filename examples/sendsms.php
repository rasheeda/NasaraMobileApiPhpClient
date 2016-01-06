<?php

require_once('../nasaramobileapiclient.php');

$phone = "233xxxxxxxxx";
$senderId = "NTesting";
$message = "hey there, this is a test message!";

$smsApi = new NasaraMobileApiClient("G4Kno/FQHQ1Au.YdWYqMY.9E");
$result = $smsApi->sendSms($phone, $senderId, $message);

if($result == '1801'){
    echo "message sent successfully";
}
elseif($result == '1802') {
    echo "message sending failed";
}
elseif($result == '1803') {
    echo "invalid login phone or password given";
}
elseif($result == '1804') {
    echo "not enough sms credit";
}
elseif($result == '1805') {
    echo "sender id must be more than 1 charater and less than 12 characters";
}
elseif($result == '1806') {
    echo "phone number must be more than 8 characters";
}


