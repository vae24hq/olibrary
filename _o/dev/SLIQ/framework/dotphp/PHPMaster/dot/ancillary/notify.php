<?php
class Notify {
	private static $instance;
	private static $status;
	public static $odao;

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
		if(Utility::codeIsSuccess($code, 'E100')){$type = 'light';}
		if(Utility::codeIsSuccess($code, 'E400')){$type = 'warning';}
		if(Utility::codeIsSuccess($code, 'E405 | E401 | E600 | E601')){$type = 'danger';}
		if(Utility::codeIsSuccess($code, 'E200')){$type = 'success';}
		$notify = '<div class="alert alert-'.$type.'" role="alert">'.$msg.'</div>';
		return  $notify;
	}
}
?>