<?php
function send_notification ($tokens, $message){
	$url = 'https://fcm.googleapis.com/fcm/send';
	$fields = array(
					'registration_ids' => $tokens,
					'data' => $message
			);

	$headers = array(
			'Authorization:key = AAAA-fRybnc:APA91bEnuuMPxafOuMighZhn7GkIXzAroaTIasg_AZHaCj39sSVoTC1GgLVfNq9SRYRRZQ3dfW3-iu3yN0VvT6LLgw7v51wX0hrr2fgRk6og-my8J8HZHMhp0zNpzfgpRwXV1qZ4btpP',
			'Content-Type: application/json'
			);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
	$result = curl_exec($ch);           
	if ($result === FALSE) {
			die('Curl failed: ' . curl_error($ch));
	}
	curl_close($ch);
	return $result;
}


$json = json_decode(file_get_contents('php://input'), true);
$inputArray = array();
$outputArray = array();
//$this->load->helper('pushnotification_helper');
//push notifications parameters

$ticker = $json['ticker'];
$title = $json['title'];
$message = $json['message'];
$viewpage = "chatmessage";

$senduserid = $json['senduserid'];
$sendusername = $json['sendusername'];
$receiveruserid = $json['receiveruserid'];

$firebasetoken = $json['firebasetoken'];

// -- push notifications parameters
if($firebasetoken!=""){
	//$tokens = explode(",",$firebasetoken);
	$tokens[0] = $firebasetoken;
	$message = array
		(
			"ticker" => $ticker,
			"title" => $title,
			"message" => $message,
			"senduserid" => $senduserid,
			"sendusername" => $sendusername,
			"receiveruserid" => $receiveruserid,
			"gotopage" => $viewpage
		);
	$outputArray['pushnotice'] = send_notification($tokens, $message);
}
//send sms as well
echo json_encode($outputArray);
die();
?>