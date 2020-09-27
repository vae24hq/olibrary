public static function demo(){
		$start = microtime(true);
		for($i=0; $i < 1; $i++){
			$database = db::instantiate();
			$data['username'] = mt_rand();
			$demo = $database->create($data, 'user');
			#helper::dbug($demo);
		}
		$stop = microtime(true);
		$seconds = ($stop - $start);
		$resp['data'] = 'Time: '.$seconds.' OR '.($seconds/60).' Mins';
		return $resp;
	}


		// public static function runApp($uri=''){
	// 	$route = helper::route();
	// 	if($route=='api'){
	// 		$link = helper::link($uri);
	// 		$callAPI = array();
	// 		$jsonResp = array();
	// 		$jsonResp['source'] = $link;
	// 		$jsonResp['status'] = 'success';
	// 		$jsonResp['code'] = 'ok';

	// 		#Routing API
	// 		$loadAPI = ofile::load($link, 'api');
	// 		if($loadAPI == 'FILE404'){
	// 			#since api file is not available, check for method on api class
	// 			$apiFile = APIZR.'api';
	// 			ofile::load($apiFile, '', 'strict');
	// 			if(!class_exists('api')){
	// 				$jsonResp['status'] = 'failed';
	// 				$jsonResp['code'] = 'E404';
	// 				$jsonResp['data'] = array('reason' => 'unavailable');
	// 			}
	// 			else {
	// 				$api = api::instantiate();
	// 				if(method_exists($api,$link)){
	// 					$callAPI = $api->$link();
	// 				}
	// 				else {
	// 					$jsonResp['status'] = 'failed';
	// 					$jsonResp['code'] = 'E404';
	// 					$jsonResp['data'] = array('reason' => 'unavailable method');
	// 				}
	// 			}
	// 		}
	// 		elseif(function_exists('callAPI')){
	// 			$callAPI = callAPI();
	// 		}
	// 		else {
	// 			$jsonResp['status'] = 'failed';
	// 			$jsonResp['code'] = 'E404';
	// 			$jsonResp['data'] = array('reason' => 'improperly formed');
	// 		}

	// 		if(!helper::oempty($callAPI) && is_array($callAPI)){
	// 			$jsonResp = array_merge($jsonResp, $callAPI);
	// 		}

	// 		helper::jsonResp($jsonResp);
	// 		return;
	// 	}
	// }





		global $oDB;
		$stmt = $oDB->prepare($query);
		$stmt->execute([':userid' => $userid, ':password' => $password, ':account' => $account]);

		$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);