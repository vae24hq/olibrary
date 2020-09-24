<?php
// if (!function_exists('isErrorMsg')){
// 	function isErrorMsg($code, $source='oGET', $return="message"){
// 		if(empty($source) || $source == 'oGET'){$source = oURL::uri();}
// 		#Login
// 		if($source == 'login'){
// 			$e['E100A1'] = 'Please enter your login details';

// 			$e['E400A1'] = 'Your UserID and Password are required';
// 			$e['E400A2'] = 'Your UserID is required';
// 			$e['E400A3'] = 'Your Password is required';

// 			$e['E405A1'] = 'Authentication failed';
// 			$e['E401A1'] = 'Incorrect login details';
// 			$e['E401A2'] = 'Your password is incorrect';

// 			$e['E200A1'] = 'Login successful';

// 			$e['E600B1'] = 'An error occurred';
// 		}

// 		#Modify Password
//



// 		#Manage Card
// 		if($source == 'card'){
// 			#Card List
// 			$e['E100L1'] = '';
// 			$e['E100S1'] = '';
// 			$e['E400A1'] = "Please search by Hospital Number or Patient's Name" ;
// 		}

// 		#Update Card
// 		if($source == 'update-card'){
// 				$e['E200A1'] = "The patient's Card record has been updated";
// 		}

// 		#Return
// 		if(!empty($e[$code])){return $e[$code];}
// 		return false;
// 	}
// }

if(!empty($fuxRoute) && $fuxRoute != 'api'){$fuxRoute = 'app';}
if(isset($fuxURI) && empty($fuxURI)){$fuxURI = 'home';}
require oUTIL.'error.php';


if($fuxRoute == 'app'){

	if($fuxURI != 'login' && $fuxURI != 'logout'){
		$fuxAuth->is();
		$fuxAuth->timeout(600000, 'nope');

		include oMODEL.'hmo.php';
		include oMODEL.'card.php';
		include oMODEL.'bill.php';

		include oUTIL.'card.php';

	}

	if($fuxURI == 'logout'){
		$fuxAuth->logout('login?refresh=yeap');
	}

	if($fuxURI == 'index'){
		oURL::redirect('./dashboard');
	}

	$oUserActive = $fuxAuth->userActive();
}

$oRecord = array();
require $fuxApp->router();
?>