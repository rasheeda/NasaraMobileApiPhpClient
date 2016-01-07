<?php

require_once('../nasaramobileapiclient.php');

$smsApi = new NasaraMobileApiClient("9EEPC38Eyf9N6Mc8beMEH");
$response = $smsApi->fetchContacts();

print_r($response);