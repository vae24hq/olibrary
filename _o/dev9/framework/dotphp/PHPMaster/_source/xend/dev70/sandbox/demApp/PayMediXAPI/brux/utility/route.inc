<?php
function APIRoute(){
	global $app;
	$route = strtolower($app->route());
	$response['source'] = trim($route, '/');
	$response['action'] = 'failed';

	if($route == 'index'){
		$response['code'] = 'E403';
		$response['response'] = array('reason' => 'forbidden');
	}
	elseif($route == 'ping'){
		$response['action'] = 'success';
		$response['code'] = 'E200';
		$response['response'] = array('api' => 'alive', 'version' => '1.0.0');
	}
	elseif($route == 'pingerror'){
		$response['code'] = 'E400';
		$response['response'] = array('reason' => 'just a sample error', 'request' => 'denied');
	}
	else {
		$apiRecord['app'] = $app->info('app');
		$apiRecord['ver'] = $app->info('version');
		$apiRecord['api'] = $app->info('api');

		#rename user/login to user-login
		$apiRecord['api'] = str_replace('/', '-', $apiRecord['api']);
		$apiRecord['api'] = trim($apiRecord['api'], '-');

		#check specific API
		#$apiPath = 'app/'.$apiRecord['app'].'/version'.$apiRecord['ver'].'/'.$apiRecord['api'].'.inc';
		$apiPath = 'app/'.$apiRecord['app'].'/'.$apiRecord['api'].'.inc';
		if(file_exists($apiPath)){include($apiPath);}

		#check general API
		else {
			$apiPath = 'brux/api/'.$apiRecord['api'].'.inc';
			if(file_exists($apiPath)){include($apiPath);}
			elseif($route != 'index'){
				$response['code'] = 'E404';
				$response['response'] = array('reason' => 'unavailable');
			}
		}
	}
	return $response;
}
?>