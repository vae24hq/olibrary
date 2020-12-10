<?php
class oSSL {
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




	//-------------- Detect HTTPS & Return true or false ---------------
	public static function isHTTPS(){
		#set defaults
		$o = FALSE; $https = 'inactive'; $port = 'default';

		#prep HTTPs
		if(!empty($_SERVER['HTTPS'])){$https = $_SERVER['HTTPS'];}
		if($https !== 'inactive'){$https == 'active';}

		#prep Port
		if(!empty($_SERVER['SERVER_PORT'])){$port = $_SERVER['SERVER_PORT'];}

		#Resolution
		if($https == 'active' || $port == 443){$o = TRUE;}
		elseif(!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'){$o = TRUE;}
		elseif(!empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on'){$o = TRUE;}

		#return
		return $o;
	}

	//-------------- Force URL to use HTTPS (will start PHP session) ---------------
	public static function impose($link='', $permanent='nope'){
		#start PHP Session
		if(!headers_sent() && empty($_SESSION)){session_start();}

		if(empty($_SESSION['oImposeSSL']) || $_SESSION['oImposeSSL'] !== 'imposed'){
			#set protocal
			$protocol = self::isHTTPS() ? 'https' : 'http';

			#Resolution (HTTP to HTTPs)
			if($protocol !== 'https'){
				$url = 'https://';
				if(!empty($link)){$url .= $link;}
				else {
					if(!empty($_SERVER['HTTP_HOST'])){$url .= $_SERVER['HTTP_HOST'];}
					if(!empty($_SERVER['REQUEST_URI'])){$url .= $_SERVER['REQUEST_URI'];}
				}

				#Valid URL only
				if(filter_var($url, FILTER_VALIDATE_URL) !== FALSE){
					$_SESSION['oImposeSSL'] = 'imposed';
					if($permanent == 'yeap'){header('HTTP/1.1 301 Moved Permanently');}
					header('Location: ' . $url);
					exit;
				}
			}
		}
	}
}
?>