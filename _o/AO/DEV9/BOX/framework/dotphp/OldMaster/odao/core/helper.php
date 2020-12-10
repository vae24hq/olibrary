<?php
class helper {
	private static $instance;
	private static $status;

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

	//-------------- URI link ---------------
	public static function link($link='')
	{
		if(isset($_GET['link'])){$link = $_GET['link'];}
		if(empty($link) || $link == 'index.php'){$link = 'index';}
		#To do ~trim possible {.php} from link

		$link = strtolower($link);
		return $link;
	}

	//-------------- URI route ---------------
	public static function route($route='')
	{
		if(isset($_GET['route'])){$route = $_GET['route'];}
		if(!empty($route)){
			#Todo ~ add other allowed routes
			$routes = array('api', 'app');
			if(!in_array($route, $routes)){$route = 'site';}
		}
		else {
			$route = 'site';
		}

		$route = strtolower($route);
		return $route;
	}

	public static function docRoot($docroot){
		if(self::isEmpty($_SERVER['DOCUMENT_ROOT']))
		{
			return $_SERVER['DOCUMENT_ROOT'];
		}
	}


	//-------------- JSON output ---------------
	public static function jsonResp($data){
		if(!empty($data)){
			header('Content-Type: application/json');
			echo json_encode($data);
			exit;
		}
	}

	//-------------- Check if variable is actually empty ---------------
	public static function oempty($data=''){
		if(!isset($data)){return TRUE;}
		else {
				if(is_array($data)){
						if(empty($data)){return TRUE;}
				} else {
						$data = trim($data);
						$length = strlen($data);
						if($length<1){return TRUE;}
				}
		}

		return FALSE;
	}

	//-------------- Check if variable multi-dimensional array ---------------
	public static function isArrayMulti($data){
		if(is_array($data)){
				$result = array_filter($data,'is_array');
				if(count($result)>0) return TRUE;
		}
		return FALSE;
	}


	//-------------- Debugging ---------------
	public static function dbug($data, $printAs=''){
		if($printAs == 'json'){return self::jsonResp($data);}
		else {
			if(is_array($data)){
				if(count($data) !== count($data, COUNT_RECURSIVE)){print_r($data);}
				else {
					foreach ($data as $key => $value){
						echo '<strong>'.$key.':</strong> '. $value.'<br>';
					}
				}
			}
			else {
				var_dump($data);
			}
		}
		exit;
	}

	public static function oRedirect($location=''){
		if(!empty($location)){header('Location: '.$location);}
		exit;
	}

	public static function oRandomiz($value='ruid'){
		if($value == 'puid'){
			$alpha = array_merge(range('A', 'Z'),range('a', 'z'), range(0,9));
			shuffle($alpha);
			$randomiz = $alpha[11].$alpha[48].mt_rand(10000000, 99999999);
		}
		if($value == 'suid'){$randomiz = mt_rand();}
		if($value == 'bind'){$randomiz = mt_rand().time();}
		if($value == 'username'){
			$alpha = array_merge(range('A', 'Z'),range('a', 'z'), range(0,9));
			shuffle($alpha);
			$randomiz = $alpha[2].$alpha[30].$alpha[14].$alpha[45].$alpha[50].time().$alpha[5].$alpha[18].$alpha[39].$alpha[7].$alpha[61];
		}
		if($value == 'short'){
			$alpha = array_merge(range('a', 'z'),range('A', 'Z'));
			shuffle($alpha);
			$randomiz = rand(10000,99999).$alpha[35].$alpha[21];
		}

		if($value == 'ruid'){
			$alpha = array_merge(range('A', 'Z'),range('a', 'z'), range(0,9));
			shuffle($alpha);
			$randomiz = $alpha[2].$alpha[30].$alpha[14].$alpha[45].$alpha[50].mt_rand().$alpha[10].$alpha[19].$alpha[39].$alpha[7].$alpha[61].time().$alpha[29].$alpha[17].$alpha[31];
		}

		if($value == 'luid'){
			$alpha = array_merge(range('A', 'Z'),range('a', 'z'), range(0,9));
			shuffle($alpha);
			$randomiz = $alpha[17].$alpha[32].self::oRandomiz('suid').$alpha[13].$alpha[42].self::oRandomiz('bind');
		}

		if($value == 'cardno'){
			$randomiz = date('Ymd').mt_rand(10,99);
		}
		return $randomiz;
	}
}
?>