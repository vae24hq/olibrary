<?php
function CreateUser(){
	#user data
	$input['status'] = 2;
	$input['phone'] = '09026636728';
	$username = 'software';
	$input['username'] = oAuth::ocrypt($username, 'oEN64');
	$input['email'] = oAuth::ocrypt($username.'@pear.ca', 'oEN64');
	$input['password'] = oAuth::password('System20#');
	$input['pin'] = 1314;
	$input['privilege'] = 20;
	$input['type'] = oAuth::ocrypt('software', 'oENCODE');
	$input['surname'] = oAuth::ocrypt('PearSDC', 'oENCODE');
	$input['firstname'] = oAuth::ocrypt('Software', 'oENCODE');
	$input['sex'] = 'M';
	$input['dob'] = oPeriod::create('October 31, 1987','oMYSQLDATE');
	$input['dept'] = 'APP';

	#insert the record
	global $zernDB;
	$insert = $zernDB->insert('userx', $input);

	#dbug the result
	dbug($insert);
	die;
}





if(!empty($zernAuth)){
	$oRecord['oDATA'] = $zernAuth->userActive();
	$oInfo = new oData();
	$oInfo->set($oRecord['oDATA']);
}
$uPuid =  $oInfo->obtain('puid');
$odao = '';
dbug($odao);


$ODAO = $hmo->all('name', "`auid` <> '0' LIMIT 2");
dbug($ODAO);
?>