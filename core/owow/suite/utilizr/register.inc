<?php
function uRegister($wow){
	#get input data
	$input = oInput::method('iRequest');

	#remove url link from input if it exist
	if(isset($input['oproject'])){unset($input['oproject']);}
	if(isset($input['olink'])){unset($input['olink']);}
	if(isset($input['oapi'])){unset($input['oapi']);}


	#@TODO: check for required input [username, email, phone, password, religion] ~ https://api.olibry.co/register?


	#sanitize data
	$input = oInput::sanitize($input);

		#@TODO: prepare input
	// if(isset($input['surname'])){$input['lastname'] = $input['surname']; unset($input['surname']);}

	// if(isset($input['name'])){
	// 	#split using [,]
	// 	if(oString::in($input['name'],',')){
	// 		$input['firstname'] = oString::before($input['name'], ',');
	// 		$input['lastname'] = oString::after($input['name'], ',');
	// 	}
	// unset($input['name']);
	// }



	#process input & return result
	$result = $wow->signup($input);
	if(isset($result['bind'])){return $result;}
	echo oPrint::neat($result); #TODO: fix & remove
	return false;
}