<?php
if(!function_exists('initModal')){
	function initModal($file='.initializ.php', $search='modal/'){
		$uri = $_SERVER['REQUEST_URI'];
		$searchFound = strpos($uri, $search);
		if($searchFound !== false){
			#URL
			$uriFilta = strstr($uri, $search);
			$pathTrim = str_replace($uriFilta, '', $uri);

			$modalURL = str_replace($search, '', $uriFilta);
			$uriQuery = strstr($modalURL, '?');

			if(!empty($uriQuery)){$modalURL = str_replace($uriQuery, '', $modalURL);}

			#PathInfo
			$rootPath = $_SERVER['DOCUMENT_ROOT'];
			$rootPath = rtrim($rootPath, '/');

			#EnvPath ~ TODO {check how to use it}
			$envPath = getenv('ROOT_PATH');
			if($envPath != null && !empty($envPath)){
				$envPath = rtrim($envPath, '/');
			}

			#Return
			$initializ = $rootPath.$pathTrim;
			if(!empty($file)){$initializ .= '/'.$file;}
			$initializ = str_replace('//', '/', $initializ);

			$return ['initializ'] = $initializ;
			$return ['uriFilta'] = $uriFilta;
			$return ['pathTrim'] = $pathTrim;
			$return ['modalURL'] = $modalURL;

			return $return;
		}
		return false;
	}
}

$initModal = initModal();
if(!empty($initModal['initializ'])){
	require $initModal['initializ'];
	require oUTIL. 'main.php';

	$modalURL = $initModal['modalURL'];


	if($modalURL == 'view-card'){
		$oRecord = cardView($_GET['card']);
		if(!empty($oRecord['data'])){}
		$oRecord['msg'] = isErrorMsg($oRecord['code']);
		$oRecord = Helper::prepResp($oRecord);
	}

	if($modalURL == 'update-card'){
		$oRecord = cardView($_GET['card']);
		if(!empty($oRecord['data'])){}
		$oRecord['msg'] = isErrorMsg($oRecord['code']);
		$oRecord = Helper::prepResp($oRecord);
	}


	$ajaxView = oVIEW.$initModal['modalURL'].'.php';
	if(file_exists($ajaxView)){require $ajaxView;}
}

?>
