<?php
if(!empty($_POST)){
	$input = oInput::method('iPost'); #get input data
	#@TODO: validate input
	$input = oInput::sanitize($input); #sanitize data

	#@TODO: prepare input
	if(isset($input['surname'])){$input['lastname'] = $input['surname']; unset($input['surname']);}

	// if(isset($input['name'])){
	// 	#split using [,]
	// 	if(oString::in($input['name'],',')){
	// 		$input['firstname'] = oString::before($input['name'], ',');
	// 		$input['lastname'] = oString::after($input['name'], ',');
	// 	}
	// unset($input['name']);
	// }

	$process = $wow->signup($input); #process input & return response
	#Set on Error/Failure
	#on success
	echo oPrint::neat($process);
}


#Load View ~ @TODO: use template engine
oFile::exist($routa['viewzr']);
require $routa['viewzr'];