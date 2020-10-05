<?php
#INDEX
if($uri == 'index'){
}

#PING
if($uri == 'ping'){
	$oresponse['status'] = 'success';
	$oresponse['record'] = 1;
	$oresponse['recordset'] = $harvestpad->project;
}

#PING-FAIL
if($uri == 'ping-failed'){
	$oresponse['status'] = 'failure';
	$oresponse['reason'] = 'fail was triggered';
	$oresponse['message'] = 'This is a test to returned failed response';
}


#PARISH LIST
if($uri == 'parish-list'){
	$omodel = $harvestpad->ParishList();
}