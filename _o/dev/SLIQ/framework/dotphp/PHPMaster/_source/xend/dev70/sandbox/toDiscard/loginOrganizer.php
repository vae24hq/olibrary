<?php
	#PROCESS VIEW
	$route = $odao->route();
	oFile::load('login','utilizr');
	if($route=='api'){
		$result = OLogin('get');
		jsonResp($result);
	}
	elseif($route=='app'){
		if(!$_POST){
			$result['code'] = 'E200A1';
			$result['data'] = array('reason' => 'Please enter your login information');
		}
		else {
			$result = OLogin('post');
			if(!empty($result['data'])){
				$resultData = $result['data'];
				if(!empty($resultData['isLogin']) && $resultData['isLogin'] == 'yeap'){
					oRedirect('dashboard');
				}
			}
		}
		$view = oFile::prepare('login','viewzr');
		if(file_exists($view)){include $view;}
		else {
			#ToDo ~ missing file reporting handler
			die('File unavailable ['.$view.']');
		}
	}
?>