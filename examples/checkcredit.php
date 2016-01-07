<?php

require_once('../nasaramobileapiclient.php');

$smsApi = new NasaraMobileApiClient("9EEPC38Eyf9N6Mc8beMEH");
$result = $smsApi->checkCredit();

switch ($result) {
	case '1903':
		echo "there was an error <br>";
		break;
	case '1902':
		echo "this api key does not exist <br>";
		break;
	case '1901':
		echo "Api key must be posted to execute request <br>";
		break;		
	
	default:
		$result = json_decode($result);
    	echo $credit = $result->data;
		break;
}
