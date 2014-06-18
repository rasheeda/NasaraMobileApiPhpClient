<?php

$phone = "233244209193";
$senderId = "Testing";
$message = "hey there, this is a test!";

$smsApi = new NasaraMobileApiClass;
$smsApi->sendSms($phone, $senderId, $message);