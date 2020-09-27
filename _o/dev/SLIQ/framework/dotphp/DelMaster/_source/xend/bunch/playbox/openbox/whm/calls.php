<?php
include 'xmlapi.php';

//function to convert XML to array
function usableXML($xml_object){
	$json_string = json_encode($xml_object);
	$task = json_decode($json_string, TRUE);
	return $task;
}

$xmlapi = new xmlapi('vien3.com','vien3c','H9UeZrEtIid76');

$xml = $xmlapi->listaccts();
$result = usableXML($xml);


//Handle Result
#when result is successfull
if(strtolower($result['statusmsg'])=='ok' && $result['status']==1){
	
	List_Account($result['acct']);
}

    
function List_Account($list){
	echo '<ol>';
	foreach ($list as $key => $value) {
		echo '<li>'.$value['domain']."\t".$value['email'].'</li>';
	}
	echo '</ol>';
	return;
}

#var_dump($result['acct']);







?>