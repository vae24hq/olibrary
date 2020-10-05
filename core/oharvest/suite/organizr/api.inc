<?php
#INDEX
if($uri == 'index'){
}

#PING
if($uri == 'ping'){
	$creo['status'] = 'success';
	$creo['record'] = 1;
	$creo['recordset'] = $harvestpad->project;
}

#PING-FAIL
if($uri == 'ping-failed'){
	$creo['status'] = 'failure';
	$creo['reason'] = 'fail was triggered';
	$creo['message'] = 'This is a test to returned failed response';
}


#PARISH LIST
if($uri == 'parish-list'){
	$omodel = $harvestpad->ParishList();
}