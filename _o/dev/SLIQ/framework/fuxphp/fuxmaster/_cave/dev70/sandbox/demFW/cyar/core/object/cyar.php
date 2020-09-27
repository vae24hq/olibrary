<?php
/* CYAR™ framework is an evolving library for rapid & efficient development of modem responsive static or dynamic website and applications.
 * Built and maintained at OIAVO™ using PHP, MySQL, HTML, CSS, JS & derived technology. Version 0.0.1 | CYAR™ Web framework © 2016
 * ========================================================================================================================================
 * PHP | object::cyar ~ framework's engine | Dependency » utility {vital}
 */

class cyar {
	public static $name;
	public static $squat;
	public static $brand;
	public static $slogan;
	public static $acronym;
	public static $basepath;
	public static $domain;
	public static $theme;
	public static $phone;
	public static $admin;
	public static $mail;
	public static $tag;
	public static $config;
	private static $instance;

	//-------------- Prevent multiple instances ---------------
	private function __construct(){self::$status = 'offline'; return;}

	//-------------- Returns a single instance ---------------
	public static function instantiate(){
		if(is_null(self::$instance)){
			self::$instance = new self();
		}
		return self::$instance;
	}


	//-------------- Pass value to class variable ---------------
	public static function setting($data){
		#toDO - $data must be an array with valid entries
		$list = array('name','squat', 'brand', 'slogan', 'acronym', 'basepath', 'domain', 'theme', 'phone', 'admin', 'mail', 'tag');
		self::$config = $data;
		foreach ($data as $label => $value){
			if(in_array($label, $list) && !empty($value)){self::$$label = $value;}
		}
		if(empty(self::$mail)){self::$mail = 'info';}
		if(empty(self::$admin)){self::$admin = 'admin';}
		if(!inString(self::$mail, '@')){self::$mail = self::$mail.'@'.self::domain();}
		if(!inString(self::$admin, '@')){self::$admin = self::$admin.'@'.self::domain();}
	}

	//-------------- Return URL ---------------
	public static function url(){
		$url = '';
		if(!empty(self::$domain)){$url .= strtolower(self::$domain);} else {$url .= strtolower($_SERVER['HTTP_HOST']);}
		
		$serverurl = strtolower($_SERVER['HTTP_HOST']);
		if(inString($serverurl, 'https')){$protocol = 'https://';}
		elseif(inString($serverurl, 'http')){$protocol = 'http://';}
		elseif (isset($_SERVER["HTTPS"]) && strtolower($_SERVER["HTTPS"] ) == "on"){$protocol = 'https://';}
		else {$protocol = 'http://';}

		$url = strtolower($protocol.$url);		
		return $url.PS;
	}

	//-------------- Return base URL ---------------
	public static function baseurl(){
		$baseurl = self::url();
		if(!empty(self::$basepath)){$baseurl .= strtolower(self::$basepath).PS;}
		return $baseurl;
	}

	//-------------- Return domain name ---------------
	public static function domain(){return strtolower(url2domain(self::baseurl()));}



	//-------------- Load file content ---------------
	protected static function content($content='', $type='slice'){
		$file = linkFile($content, $type, 'DS');
		if($file){
			if(is_file($file)){include_once($file); return;}
			else {
				#return 'Not Found' error
				$document['name'] = $content; $document['file'] = $file; $document['type'] = $type;
				if($type == 'page' || $type == 'view'){return markup::notFound($document['name'], $document['type'], $document['file']);}
				return markup::unavailable($document['name'], $document['type'], $document['file']);
			}
		}
		return printMsg('unable to prepare '.strtoupper($type).' file for ['.$content.']');
	}



	//-------------- Return page title ---------------
 	public static function title($title=''){
		if(isEmpty($title)){
			#get configure title
			$route = route('trim'); $cfTitle = self::$config['title']; $title = '';

			#if title exist for page in global configuration
			if(!empty($cfTitle) && array_key_exists($route, $cfTitle)){$title .= $cfTitle[$route];}
			else {
				if($route == 'index'){
					if(!empty(self::$name)){$title .= self::$name;}
					if(!empty($title)){$title .= ' :: ';}
					if(!empty(self::$brand)){$title .= self::$brand;}
					if(!empty(self::$slogan)){$title .= ' - '.sentence(self::$slogan);}
				}
				elseif($route == 'home'){
					if(!empty(self::$squat)){$title .= self::$squat;}
					if(!empty(self::$brand)){
						if(!empty($title)){$title .= ' :: ';}
						$title .= self::$brand;
					}
				}
				elseif($route == 'welcome' && !empty(self::$squat)){$title .= 'Welcome to '.self::$squat;}
				else {#build title for other page
					if(inString($route, '_')){$route = stringSwap($route, '_', ' » ');}
					$title .= capitalize(cleanup($route));
					if(!empty(self::$squat)){
						if(!empty($title) && str_word_count($title) > 1){$title .= ' |';}
						$title .= ' '.self::$squat;
					}
					if(!empty(self::$brand)){
						if(!empty($title)){$title .= ' • ';}
						$title .= self::$brand;
					}
				}
			}
		}		
		return $title;
	}

	//-------------- Build meta {description & keywords} ---------------
	public static function meta($type, $route=''){
		if(empty($route)){$route = route('trim');}
		$meta = self::$config[strtolower($type)];
		$metaInfo = '';
		if($type == 'description'){
			if(!empty(self::$brand)){$metaInfo .= self::$brand;}
			$separator  = ' - ';
		}
		if($type == 'keywords'){
			if(!empty(self::$acronym)){$metaInfo .= self::$acronym;}
			$separator = ', ';
		}
		#if description or keyword(s) exist for page
		if(!empty($meta) && array_key_exists($route, $meta)){$metaInfo .= $separator.$meta[$route];}
		else {#use default Slogan & Tags
			if($type=='description'){
				if(!empty(self::$squat)){$metaInfo .= ', '.self::$squat;}
				if($route != 'index' && $route != 'welcome'){$metaInfo .= ' '.sentence(cleanup($route));}
				$metaInfo .= $separator.self::$slogan;
			}
			if($type=='keywords'){				
				if(!empty(self::$tag)){$metaInfo .= $separator.self::$tag;}
				if($route == 'index' && !empty(self::$name)){$metaInfo .= $separator.self::$name;}
				elseif($route == 'home' && !empty(self::$acronym)){$metaInfo .= $separator.self::$acronym. ' Home';}
				elseif($route == 'welcome' && !empty(self::$brand)){$metaInfo .= $separator.'Welcome to '.self::$brand;}
				else {
					if(inString($route,'_')){$route = capitalize(cleanup($route));} else {$route = cleanup($route);}
					$metaInfo .= $separator.sentence($route);
					if(!empty(self::$acronym) && str_word_count($route) == 1){$metaInfo .= ' '.self::$acronym;}
				}
				if(!empty(self::$squat)){$metaInfo .= $separator.self::$squat;}
			}
		}
		return $metaInfo;
	}



	//-------------- Lunch application or site ---------------
	public static function start(){
		if(route('trim') == 'index'){return self::content('organizer', 'index');}
		echo route('trim');
	}

} //************ End of class ~ CYAR ************//
?>