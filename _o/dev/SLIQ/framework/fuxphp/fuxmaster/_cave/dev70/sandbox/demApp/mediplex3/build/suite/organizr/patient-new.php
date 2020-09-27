<?php
// oFile::load('auth','modelizr');
// oFile::load('auth','utilizr');
// $iActiveUser = doAuth();

// $view = oFile::prepare('patient-new','viewzr');
// if(file_exists($view)){include $view;}
?>


<?php
	#PROCESS VIEW
	// $route = oRoute::URIRoute();
	// oFile::load('login','utilizr');
	// if($route=='api'){
	// 	$result = aLogin('get');
	// 	jsonResp($result);
	// }
	// elseif($route=='app'){
	// 	if(!$_POST){
	// 		$result['code'] = 'E200A1';
	// 		$result['data'] = array('reason' => 'Please enter your login information');
	// 	}
	// 	else {
	// 		$result = aLogin('post');
	// 		if(!empty($result['data'])){
	// 			$resultData = $result['data'];
	// 			if(!empty($resultData['isLogin']) && $resultData['isLogin'] == 'yeap'){
	// 				oRedirect('dashboard');
	// 			}
	// 		}
	// 	}
	// 	$view = oFile::prepare('login','viewzr');
	// 	if(file_exists($view)){include $view;}
	// 	else {
	// 		#ToDo ~ missing file reporting handler
	// 		die('File unavailable ['.$view.']');
	// 	}
	// }

oFile::load('patient','modelizr');

$row = patient::isHospitalNo('808');
var_dump($row);
?>