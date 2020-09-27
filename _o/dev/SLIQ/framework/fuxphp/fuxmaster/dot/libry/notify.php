<?php
class Notify {
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


	//-------------- Prepare Notification ---------------
	public static function useDiv($msg='', $code=''){
		if(empty($msg)){return false;}
		$type = 'light';
		if(Helper::isCodeSucess($code, 'E100')){$type = 'light';}
		if(Helper::isCodeSucess($code, 'E400')){$type = 'warning';}
		if(Helper::isCodeSucess($code, 'E405 | E401 | E600 | E601')){$type = 'danger';}
		if(Helper::isCodeSucess($code, 'E200')){$type = 'success';}
		$notify = '<div class="alert alert-'.$type.'" role="alert">'.$msg.'</div>';
		return  $notify;
	}
}
?>