<?php
class ZERN {
	var $name;
	var $brand;
	var $domain;
	var $email;
	var $phone;
	var $url;

	var $db_name;
	var $db_user;
	var $db_password;
	var $db_host;
	var $db_driver;
	var $db_userx;


	//-------------- Construct & Set variables ---------------
	public function __construct($config='')
	{
		if (empty($config)){$config = zernConfig();}
		if (empty($config) || !is_array($config)) {
			die('Configuration is required');
		}

		#Set variables
		foreach ($config as $label => $value) {
			if (is_array($value) && $label != 'link_allowed') { #label is an array
				foreach ($value as $sub_label => $sub_value) {
					$subLabel = $label . '_' . $sub_label;
					$this->$subLabel = $sub_value;
				}
			} #end - label is an array
			else { #label is not array
				$this->$label = $value;
			} #end - label is not array
		}

		#Set base URL
		#TODO ~ set base url from configuration
		$baseURL = $this->baseURL();
		if(!empty($baseURL)){$this->url = $baseURL;}
	}


	//-------------- Initialize APP ---------------
	public function initialize($zone='Africa/Lagos')
	{
		mb_internal_encoding("UTF-8");
		ini_set('session.cache_limiter', 'public');
		session_cache_limiter(false);
		oSession::start();
		date_default_timezone_set($zone);
		return;
	}


	public function baseURL($url=''){
		if(empty($url)){
			if(defined('oBURL')){$url = oBURL;}
			elseif(!empty($_SERVER["SERVER_NAME"])){$url = $_SERVER["SERVER_NAME"];}
		}
		if(!empty($url)){
			if(hasSSL()){$url = 'https://'.$url;} else {$url = 'http://'.$url;}
			return $url;
		}
		return false;
	}


	public function linkTo($path=''){
		if(!empty($path) && $path != 'oLINK'){
			$link = '';
			if(!empty($this->url)){$link .= $this->url.PS;}
			$link .= $path;
		}

		if($path == 'oLINK'){
			$link = $this->url.PS.oURL::uriData('', 'oLINK');
		}

		if(!empty($link)){return $link;}
	}


	public function redirect($dest='', $delay=0){
		if(!empty($this->url)){$dest = $this->url.PS.$dest;}
		return oURL::redirect($dest, $delay);
	}


	//-------------- Application Routing Handler ---------------
	public function router($link='oGET', $route='oGET'){
		if(empty($link) || $link=='oGET'){
			$uriData = oURL::uriData();
			$link = $uriData['link']; #$uri = oURL::uri(); ~ concept changed from uri to link [a uri data]
		}
		if(empty($route) || $route=='oGET'){$route = oURL::route();}
		if($route=='ipaddress' || $route=='site'){$route = 'app';}

		if(!empty($this->link_allowed) && array_key_exists($link, $this->link_allowed)){
			if(!empty($this->link_allowed[$link])){$organizer = oRGANIZ.strtolower($this->link_allowed[$link]).'.php';}
			elseif(file_exists(oRGANIZ.$link.'.php')){$organizer = oRGANIZ.$link.'.php';}
			elseif(!empty($this->link_allowed['default'])){$organizer = oRGANIZ.strtolower($this->link_allowed['default'].'.php');}
			else {$organizer = oRGANIZ.'index.php';}

			if(file_exists($organizer)){$router = $organizer;}
			else {
				if(defined('oAPP_MODE') && oAPP_MODE == 'dev'){
					die('Organizer [<strong>'.$link.']</strong> is unavailable');
				} else {
					oHTML::eHTTPView(404);
				}
			}
		}
		else {
			$http = oDESIGN.'ehttp.php';
			if(file_exists($http)){$router = $http;}
			else {
				oHTML::eHTTPView(400);
			}
		}

		return $router;
	}


	//-------------- Document title ---------------
	public function title($return='oPAGE'){
		$title='';
		$uriData = oURL::uriData();
		if($uriData['link'] != 'index'){
			#TODO ~ capitalize certain words
			$capWords = array('hmo');
			if(in_array($uriData['link'], $capWords)){$uriData['link'] = strtoupper($uriData['link']);}
			$title = trim($uriData['link']);
			$title = str_replace('-', ' ', $uriData['link']);
			if(!empty($uriData['action']) && $uriData['action'] != 'default'){$title = $uriData['action'].' '.$title;}
		}

		#if return page title
		if($return == 'oPAGE'){
			if(!empty($title)){$title = $title.' - ';}
			$title = $title.$this->project;
		}


		if(!empty($title)){return $title = ucwords($title);}
		return false;
	}


	public static function view($data='')
	{
		if(empty($data)){$data = oURL::uriData();}
		if(!empty($data) && is_array($data)){
			$link = $data['link'];
			$action = $data['action'];
		}
		$view = $link;
		if($action != 'default'){$view .= '_'.$action;}
		return $view.'.php';
	}
}
?>