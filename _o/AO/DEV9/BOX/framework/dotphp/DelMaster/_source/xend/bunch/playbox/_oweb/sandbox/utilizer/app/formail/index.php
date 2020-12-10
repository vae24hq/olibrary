<?php
require 'omail.php';
function formail(){
	$response = 'NOTHIN';

	if(isset($_GET['formail'])){
		$response = 'FAILED';
		$ID = $_GET['formail'];
		if($ID == '84551241' || $ID == 'demo'){
			$oMail = oMail($_GET);
			if(!$oMail){return array('status' => 'NOT SENT');}
			else{return array('status' => 'OK');}
		}
	}

	if($response == 'NOTHIN' || $response == 'FAILED'){
		return array('status' => 'FAILED');
	}
}

$res = formail();
echo json_encode($res);
?>