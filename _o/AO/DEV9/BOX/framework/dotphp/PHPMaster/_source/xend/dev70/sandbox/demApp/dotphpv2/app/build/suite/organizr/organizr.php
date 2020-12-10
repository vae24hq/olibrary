<?php
class organizr {
	private static $instance;

	//-------------- Prevent multiple instances ---------------
	private function __construct(){return;}

	//-------------- Prevent duplication ---------------
	private function __clone(){return;}

	//-------------- Returns a single instance ---------------
	public static function instantiate(){
		if(is_null(self::$instance)){
			self::$instance = new self();
		}
		return self::$instance;
	}

	public static function ping($route){
		$resp = array(
			'source' => 'ping',
			'status' => 'success',
			'code' => 'ok'
		);
		if($route=='api'){
			$pingFile = ofile::load('ping', 'apizr');
			$callAPI = callAPI();
			if(!helper::oempty($callAPI) && is_array($callAPI)){
				$resp = array_merge($resp, $callAPI);
			}
			helper::jsonResp($resp);
		}
		if($route=='app'){
			helper::dbug($resp);
		}
	}

	public static function index($route){
		if($route=='api'){
			$resp = array(
				'source' => 'index',
				'status' => 'success',
				'code' => 'ok'
			);
			$resp['data'] = array('sample' => 'This is index API example');
			helper::jsonResp($resp);
		}
		if($route=='app'){
			helper::oRedirect('login');
		}
	}

}
?>