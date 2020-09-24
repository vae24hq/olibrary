FUX MODAL
<hr>
<?php
if (!function_exists('initModal')) {
	function initModal($file = '.init.php', $search = 'modal/')
	{
		$uri = $_SERVER['REQUEST_URI'];
		$searchFound = strpos($uri, $search);
		if ($searchFound !== false) {
			#URL
			$uriFilta = strstr($uri, $search);
			$pathTrim = str_replace($uriFilta, '', $uri);

			$URL = str_replace($search, '', $uriFilta);
			$uriQS = strstr($URL, '?');

			if (!empty($uriQS)) {
				$URL = str_replace($uriQS, '', $URL);
			}
			$uriQS = trim($uriQS, '?');


			#PathInfo
			$rootPath = $_SERVER['DOCUMENT_ROOT'];
			$rootPath = rtrim($rootPath, '/');

			#EnvPath ~ TODO {check how to use it}
			$envPath = getenv('ROOT_PATH');
			if ($envPath != null && !empty($envPath)) {
				$envPath = rtrim($envPath, '/');
			}

			#Return
			$init = $rootPath . $pathTrim;
			if (!empty($file)) {
				$init .= '/' . $file;
			}
			$init = str_replace('//', '/', $init);

			$return['init'] = $init;
			$return['uriFilta'] = $uriFilta;
			$return['pathTrim'] = $pathTrim;
			$return['URL'] = $URL;
			$return['uriQS'] = $uriQS;

			return $return;
		}
		return false;
	}
}

$initModal = initModal();
if (!empty($initModal['init'])) {
	require $initModal['init'];
	$fuxRoute = oURL::route();
	$fuxURI = $initModal['URL'];
	require 'app.php';
}
?>