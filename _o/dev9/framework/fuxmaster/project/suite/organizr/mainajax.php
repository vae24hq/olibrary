<?php
if(!function_exists('initAjax')){
	function initAjax($file='.initializ.php', $search='ajax/'){
		$uri = $_SERVER['REQUEST_URI'];
		$searchFound = strpos($uri, $search);
		if($searchFound !== false){
			#URL
			$uriFilta = strstr($uri, $search);
			$pathTrim = str_replace($uriFilta, '', $uri);
			$ajaxURL = str_replace($search, '', $uriFilta);

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
			$return ['ajaxURL'] = $ajaxURL;

			return $return;
		}
		return false;
	}
}

$initAjax = initAjax();
if(!empty($initAjax['initializ'])){
	require $initAjax['initializ'];
	require oUTIL. 'main.php';

	$ajaxView = oVIEW.$initAjax['ajaxURL'].'.php';
	if(file_exists($ajaxView)){require $ajaxView;}
}
?>