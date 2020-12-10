<?php
require 'konfig.php';
$request = oRequest();

if($request == 'login'){
	$userid = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	$login = login($userid, $password);
	if(!$login){oRedirect('/behms/sign-in?status=invalid');}
	else {
		oRedirect('/behms/dashboard');
	}
}
elseif($request == 'add-patient'){
	$go = patient::create('cardno');
	if($go !== FALSE){
		oRedirect('/behms/book-appointment?patient='.$go);
	}
}
elseif($request == 'book-appointment'){
	$go = appointment::create();
	if($go !== FALSE){
		oRedirect('/behms/dashboard');
	}
}
elseif($request == 'add-staff'){
	$go = staff::create();
	if($go !== FALSE){
		oRedirect('/behms/add-staff?staff='.$go);
	}
}
?>