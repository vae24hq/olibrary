<?php
class session {
	private static $instance;
	public static $status;

	private function __construct(){self::$status = 'offline';}

	public static function instantiate(){
		if(is_null(self::$instance)){
			self::$instance = new self();
		}

		return self::$instance;
	}

	public static function start(){
		if(self::$status != 'alive'){
			session_start();
			self::$status = 'alive';
		}

		return;
	}

	public static function online(){
		if(self::$status == 'alive'){return TRUE;}

		return FALSE;
	}

	public static function stop(){
		if(self::online()){
			self::$status = 'dead';
			session_destroy();
		}

		return;
	}

	public static function terminate(){
		if(self::online()){
			$_SESSION = array();
			if(ini_get("session.use_cookies")){
				$params = session_get_cookie_params();
			  setcookie(session_name(), '', time() - 42000,
			  	$params["path"], $params["domain"],
			  	$params["secure"], $params["httponly"]
			  );
			}
			self::$status = 'dead';
			session_unset();
			session_destroy();
		}

		return;
	}

	public static function reset(){
		self::terminate();
		self::start();

		return;
	}
}
?>