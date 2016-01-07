<?php

require_once('../nasaramobileapiclient.php');

$smsApi = new NasaraMobileApiClient("9EEPC38Eyf9N6Mc8beMEH");
$response = json_decode($smsApi->fetchContactDetails(337));

print_r($response->data->contact);