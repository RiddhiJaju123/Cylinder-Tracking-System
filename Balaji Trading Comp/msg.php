<?php

$mn= $_POST['mn'];
$count= $_POST['count'];
$countr= $_POST['countr'];
$it=$_POST['itemtype'];
$date=$_POST['date'];
	// Account details
	$apiKey = urlencode('hwrF6lIHNjI-osDYEkCrupraDUY6rcFJNsSC1BlBjO	');
	
	// Message details
	// $numbers = '$mn';
	$sender = urlencode('TXTLCL');
	// $message = rawurlencode('balaji trading company');
 $message = "$count $it cylinders are dispached and $countr $it empty cylinders are received on $date. Regards Balaji Trading Company"; 
	// $numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => $mn, "sender" => $sender, "message" => $message);
 
	// Send the POST request with cURL
	$ch = curl_init('https://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	echo $response;
?>