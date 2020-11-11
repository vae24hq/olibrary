<?php
class utilAPI {
	public static function isKey($i=''){
		$keys = array('5tMmoDgiJ301edHRj2T5', '40zqD0deYpGQIHumiXsn', '2020AOWP');
		if(empty($i) && !empty($_REQUEST['okey'])){$i = $_REQUEST['okey'];}
		if(empty($i)){
			$resp['status'] = 'F9';
			$resp['reason'] = array('summary' => 'API Key Required', 'details' => 'An API Key is required to use this service');
			return $resp;
		}
		elseif(!in_array($i, $keys)){
			$resp['status'] = 'F9';
			$resp['reason'] = array('summary' => 'API Key Invalid', 'details' => 'Your API Key is invalid');
			return $resp;
		}
		return true;
	}




	public static function isPlatform($i=''){
		$keys = array('webapi', 'ios', 'android');
		if(empty($i) && !empty($_REQUEST['oplatform'])){$i = strtolower($_REQUEST['oplatform']);}
		if(empty($i)){
			$resp['status'] = 'F9';
			$resp['reason'] = array('summary' => 'Platform Required', 'details' => 'You must specify the platform');
			return $resp;
		}
		elseif(!in_array($i, $keys)){
			$resp['status'] = 'F9';
			$resp['reason'] = array('summary' => 'Platform Unknown', 'details' => 'Your platform is unknown [platform: '.$i.']');
			return $resp;
		}
		return true;
	}
}