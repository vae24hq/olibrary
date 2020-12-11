<?php
class oSession {
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




	//-------------- Start PHP session safely ---------------
	public static function start(){
		if(!headers_sent() && empty($_SESSION)){
			return session_start();
		}
	}

	//-------------- PHP session rollback [to last active session information] ---------------
	public static function rollback(){
		if(!empty($_SESSION)){
			return session_reset();
		}
	}

	//-------------- PHP session abort [maintain session while discarding changes to session on current page] ---------------
	public static function abort(){
		if(!empty($_SESSION)){
			return session_abort();
		}
	}

}
?>