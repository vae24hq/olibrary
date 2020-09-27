<?php
/* erko3™ framework - an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website.
 * Built by SlimEdge™ [@officialSEID - www.seid.com.ng] using PHP, HTML, CSS, JS & derived technology. © July 2016 | version 1.0
 * ================================================================================================================================
 * PHP | erko::erko3 ~ framework engine | Dependency » +
 */

class erko {
	public static $name;
	public static $squat;
	public static $brand;
	public static $slogan;
	public static $acronym;
	public static $ui;
	public static $tag;
	public static $email;
	public static $phone;
	public static $domain;
	public static $webadmin;
	public static $config;
	private static $instance;

	// Prevent multiple instances
	private function __construct(){return;}

	// Returns a single instance
	public static function instantiate(){
		if(is_null(self::$instance)){
			self::$instance = new self();
		}
		return self::$instance;
	}

	// Pass value to class variable
	public static function setting($data){
		#toDO - $data must be an array with valid entries
		$list = array('name','squat', 'brand', 'slogan', 'acronym', 'ui', 'tag', 'email', 'phone', 'domain', 'webadmin');
		self::$config = $data;
		foreach ($data as $label => $value){
			if(in_array($label, $list) && !empty($value)){self::$$label = $value;}
		}
		if(empty(self::$email)){self::$email = 'info';}
		if(empty(self::$webadmin)){self::$webadmin = 'admin';}
		if(!inString(self::$email, '@')){self::$email = self::$email.'@'.self::domain();}
		if(!inString(self::$webadmin, '@')){self::$webadmin = self::$webadmin.'@'.self::domain();}
	}

	// Return base URL
	public static function url(){
		if(!empty(self::$domain)){return strtolower(self::$domain);} else {return strtolower($_SERVER['HTTP_HOST']);}
	}

	// Return domain name
	public static function domain(){return strtolower(url2domain(self::url()));}

	// Return domain URL
	public static function domainURL(){
		$protocol = 'http://';
		if(inString(self::url(), 'https')){$protocol = 'https://';}
		elseif(inString(self::url(), 'http')){$protocol = 'http://';}
		elseif (isset($_SERVER["HTTPS"]) && strtolower($_SERVER["HTTPS"] ) == "on"){$protocol = 'https://';}
		if(inString(self::url(), 'www.')){$protocol .= 'www.';}
		return strtolower($protocol.self::domain());
	}

	// Return site address
	public static function site(){return self::domainURL();}

	// Return remote directory
	public static function RD(){return strtolower(stringSwap($_SERVER['DOCUMENT_ROOT'], DS, '', 'last'));}



/**
 * ---------------------------------------------------------------------------
 *  This section is for LOADER operations
 * ---------------------------------------------------------------------------
 */

	// Return page name as determined by the url
	public static function page($trim='sure'){
		$page = 'index';
		if(isset($_GET['page']) && !empty($_GET['page'])){$page = $_GET['page'];}
		if(inString($page, '/')){$page = stringSwap($page, '/', '_');} #change possible 'support/faq' to 'support_faq'
		#find and trim '_' from the end
		$last = posChar($page, '_', 'last');
		$length = strlen($page);
		if($length == $last && $trim == 'sure'){$page = stringSwap($page, '_', '', 'last');}
		return strtolower(trim($page));
	}

	// Prepare content {determine & return file location}
	protected static function prepare($content, $type='', $separator='DS'){
		$prepare = SOURCE; $content = strtolower($content); $type = strtolower($type);
		if($type == 'slice'){$prepare = SLICE;}
		elseif($type == 'page'){$prepare = VIEW;}		
		elseif($type == 'plug'){$prepare = PLUG;}
		return strtolower($prepare.constant(strtoupper($separator)).$content).'.php';
	}

	// Load content
	public static function content($content='', $type='slice'){
		$file = self::prepare($content, $type, 'DS');
		if($file){
			if(is_file($file)){include_once($file); return;}
			else {
				#return 'Not Found' error
				$document['name'] = $content; $document['file'] = $file; $document['type'] = $type;
				if($type == 'page'){return notFound($document);}
				else {
					notify('<p>Missing '.strtoupper($type).' ['.$content.']</p>');
					if(SET_MODE == 'development'){echo '<pre><tt><b>Name:</b> '.$content."\t".'<b>Type:</b> '.$type."\t".'<b>File:</b> '.$file.'</tt></pre>';}
					return;
				}
			}
		}
		return printMsg('unable to prepare '.strtoupper($type).' file for ['.$content.']');
	}

	// Build meta {description & keywords}
	protected static function buildMeta($type, $page=''){
		#toDO - $type must contain with valid entries	
		if(empty($page)){$page = self::page();}
		$meta = self::$config[strtolower($type)];
		if($type == 'description'){$separator  = ' - ';}
		if($type == 'keywords'){$separator = ', ';}
		$metaInfo = ''; if(!isEmpty(self::$brand)){$metaInfo .= self::$brand;}
		#if description or keyword(s) exist for page
		if(!empty($meta) && array_key_exists($page, $meta)){$metaInfo .= $separator.$meta[$page];}
		else {#use default Slogan & Tags
			if($type=='description' && !empty(self::$slogan)){$metaInfo .= $separator.self::$slogan;}
			if($type=='keywords'){
				if(!empty(self::$tag)){$metaInfo .= $separator.self::$tag;}
				elseif($page != 'index'){$metaInfo .= $separator.sentence(cleanup($page));}
				elseif(!isEmpty(self::$name)){$metaInfo .= $separator.self::$name;}
			}
		}

		return $metaInfo;
	}



/**
 * ---------------------------------------------------------------------------
 *  This section is for HTML HEAD operations
 * ---------------------------------------------------------------------------
 */

	// Returns valid doctype declaration
	public static function doctype(){
		if(!isIE('<=', 9)){$doctype = '<!doctype html>';}
		elseif(getBrowser() == 'operamini' || getBrowser() == 'operamobi'){
			$doctype = '<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">';
		} else {$doctype = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">';}			
		echo $doctype."\n";
	}

	//Returns valid charset
	public static function charset(){
 		if(!isIE('<=', 9)){$charset ='<meta charset="utf-8">';} else {$charset ='<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';}
 		echo $charset."\n";
 	}

 	//Returns viewport
 	public static function viewport(){
 		if(
 			(Device::identify() == 'phone' && Device::is() == 'phone') ||
 			(Device::identify() == 'tablet' && (Device::is() == 'tablet' || Device::is() == 'phone'))
 			){echo '<meta name="viewport" content="width=device-width">'."\n";}
	}

	//Returns XUA Compactible
	public static function XUA(){
 		if(isIE('==',8)){$XUA ='<meta http-equiv="X-UA-Compatible" content="IE=8" />';}
 		elseif(getBrowser() == 'ie'){$XUA ='<meta http-eqbaseuiv="X-UA-Compatible" content="IE=edge">';} 		
 		if(!empty($XUA)){echo $XUA."\n";}
 	}

 	//Returns page title
 	public static function title($value=''){
		if(isEmpty($value)){
			#get configure title
			$page = self::page(); $cfTitle = self::$config['title']; $title = '';

			#if title exist for page in global configuration
			if(!empty($cfTitle) && array_key_exists($page, $cfTitle)){$title .= $cfTitle[$page];}
			else {
				#build title for index page {making sure site name exist}
				if($page == 'index' && !empty(self::$name)){$title .= 'Welcome to '.self::$name;}
				else {
					#build title for other page
					$title .= capitalize(cleanup($page));

					#add site brand or site name
					if(!empty(self::$brand)){
						if(!empty($title)){$title .= ' :: ';}
						$title .= self::$brand;

						#add slogan
						if(!empty(self::$slogan)){$title .= ' - '.sentence(self::$slogan);}
					}
				}
			}
		}
		else {$title = $value;}
		
		echo sentence($title);
	}

	//Returns meta information
	public static function meta($distribution='global', $follow='follow'){
 		$meta = '';
 		if($distribution != 'nope'){$meta .= '<meta name="distribution" content="'.$distribution.'">'."\n";}
 		$meta .= '<meta name="description" content="'.self::buildMeta('description').' - '.self::domain().'">'."\n";
		$meta .= '<meta name="keywords" content="'.self::buildMeta('keywords').'">'."\n";
		if($follow == 'follow'){$robots ='index, follow';} else {$robots = 'index, nofollow';}
		$meta .= '<meta name="robots" content="'.$robots.'">'."\n";
		if(Device::identify() == 'desktop'){$meta .= '<meta name="format-detection" content="telephone=no">'."\n";} #identify the actual device
		echo $meta;
	}

	//Returns favicon
	public static function favicon($path=''){
		$ver = ''; if(SET_MODE != 'production'){$ver = '?version='.mt_rand();}
		if(isEmpty($path)){$path = pathTo('favicon');}
		if(getBrowser() == 'ie'){$favicon ='<link rel="shortcut icon" type="image/x-icon" href="'.$path.'favicon.ico'.$ver.'">'."\n";}
		elseif(getBrowser() == 'operamobi' || getBrowser() == 'operamini'){
			$favicon ='<link rel="icon" type="image/x-icon" href="'.$path.'favicon.ico'.$ver.'">'."\n";
		} else {$favicon ='<link rel="icon" type="image/png" href="'.$path.'favicon.png'.$ver.'">'."\n";}		
		if(Device::identify() != 'desktop'){
			$favicon .='<link rel="apple-touch-icon-precomposed" href="'.$path.'apple-touch-icon-precomposed.png'.$ver.'">'."\n";
			$favicon .='<link rel="apple-touch-icon" sizes="72x72" href="'.$path.'apple-touch-icon-72x72.png'.$ver.'">'."\n";
			$favicon .='<link rel="apple-touch-icon" sizes="114x114" href="'.$path.'apple-touch-icon-114x114.png'.$ver.'">'."\n";
			$favicon .='<link rel="apple-touch-icon" sizes="144x144" href="'.$path.'apple-touch-icon-144x144.png'.$ver.'">'."\n";
		}
		echo $favicon;
	}

	//Returns stylesheet link
	public static function stylesheet($flex='device', $ui='auto'){
		$ver = ''; if(SET_MODE != 'production'){$ver = '?version='.mt_rand();}

		#set device
		if($flex !='device' && !isEmpty($flex)){$device = $flex;}
		else {
			$device = Device::is();
			if(isIE('<=', 9)){$device = 'ie';}
			else {
				if($device == 'phone'){$device ='small';}
				elseif($device == 'tablet'){$device ='medium';}
				else {$device ='large';}
			}				
		}		

		#set baseui
		if($ui == 'auto' && !isEmpty(self::$ui)){$ui = self::$ui;} else {$ui = '';}
		if(!isEmpty($ui)){$ui = $ui.'-';}	
		$ui = pathTo('styles').$ui;

		$link = '<link rel="stylesheet" href="'.pathTo('styles').'clear.css'.$ver.'">'."\n";
		if($flex == 'device' || $flex == 'mquery'){$link .='<link rel="stylesheet" media="all" href="'.$ui.'global.css'.$ver.'">'."\n";}
		if($flex != 'mquery'){$link .='<link rel="stylesheet" href="'.$ui.strtolower($device).'.css'.$ver.'">'."\n";}
		else {
			$link .='<link rel="stylesheet" media="screen and (max-width: 480px)" href="'.$ui.'small.css'.$ver.'">'."\n";
			$link .='<link rel="stylesheet" media="only screen and (min-width:481px) and (max-width:768px)" href="'.$ui.'medium.css'.$ver.'">'."\n";
			$link .='<link rel="stylesheet" media="only screen and (min-width:769px)" href="'.$ui.'large.css'.$ver.'">'."\n";
		}	
		if(isIE('<', 7)){$link .='<style type="text/css"> .group {height: 1%;}</style>'."\n";}
		elseif(isIE('==', 7)){$link .='<style type="text/css"> .group {display:inline-block;}</style>'."\n";}		
		echo $link;
	}

	//Returns stylesheet link
	public static function js($path='', $responsive='sure'){
		$ver = ''; if(SET_MODE != 'production'){$ver = '?version='.mt_rand();}
		if(isEmpty($path)){$path = pathTo('javascript');}
		$js ='<script src="'.$path.'jquery.js"></script>'."\n";
		if(isIE('<', 9)){
			$js .='<script src="'.$path.'html5.js"></script>'."\n";
			$js .='<script src="'.$path.'selectivizr.js"></script>'."\n";
		}
		if($responsive == 'sure'){
			if(isIE('<', 9)){
				$js .='<script src="'.$path.'respond.js"></script>'."\n";
			}
			$js .='<script src="'.$path.'nav.js"></script>'."\n";
			$js .='<script src="'.$path.'slides.js"></script>'."\n";
		}		
		echo $js;
	}

	//Returns spry link
	public static function spry($sprySet='', $set_path=''){
		if(isEmpty($set_path)){$path['js'] = pathTo('javascript'); $path['css'] = pathTo('styles');}
		else {$path['js'] = $set_path; $path['css'] = $set_path;}

		$spryJS_TextField ='<script src="'.$path['js'].'SpryValidationTextField.js"></script>'."\n";
		$spryJS_Password ='<script src="'.$path['js'].'SpryValidationPassword.js"></script>'."\n";
		$spryJS_TextArea ='<script src="'.$path['js'].'SpryValidationTextarea.js"></script>'."\n";
		$spryJS_Select ='<script src="'.$path['js'].'SpryValidationSelect.js"></script>'."\n";
		$spryJS_CheckBox ='<script src="'.$path['js'].'SpryValidationCheckbox.js"></script>'."\n";
		$spryJS_Radio ='<script src="'.$path['js'].'SpryValidationRadio.js"></script>'."\n";
		$spryJS_Confirm ='<script src="'.$path['js'].'SpryValidationConfirm.js"></script>'."\n";

		$spryCSS_TextField ='<link rel="stylesheet" href="'.$path['css'].'SpryValidationTextField.css">'."\n";
		$spryCSS_Password ='<link rel="stylesheet" href="'.$path['css'].'SpryValidationPassword.css">'."\n";
		$spryCSS_TextArea ='<link rel="stylesheet" href="'.$path['css'].'SpryValidationTextarea.css">'."\n";
		$spryCSS_Select ='<link rel="stylesheet" href="'.$path['css'].'SpryValidationSelect.css">'."\n";
		$spryCSS_CheckBox ='<link rel="stylesheet" href="'.$path['css'].'SpryValidationCheckbox.css">'."\n";
		$spryCSS_Radio ='<link rel="stylesheet" href="'.$path['css'].'SpryValidationRadio.css">'."\n";
		$spryCSS_Confirm ='<link rel="stylesheet" href="'.$path['css'].'SpryValidationConfirm.css">'."\n";

		$sprySets = array('TextField','Password','TextArea','Select','CheckBox','Radio','Confirm');

		$prep = ''; $spryjs = ''; $sprycss = '';
		if(is_array($sprySet)){
			foreach ($sprySet as $set => $spry){
				if(in_array($spry, $sprySets)){
					$js = 'spryJS_'.$spry;
					$spryjs .= $$js;

					$css = 'spryCSS_'.$spry;
					$sprycss .= $$css;
				}
			}
			$prep .= $spryjs.$sprycss;
		}
		elseif(in_array($sprySet, $sprySets)){
			$js = 'spryJS_'.$sprySet;
					$spryjs .= $$js;

					$css = 'spryCSS_'.$sprySet;
					$sprycss .= $$css;
			$prep .= $spryjs.$sprycss;
		}
		else {
			$prep = "\n".$spryJS_TextField.$spryJS_Password.$spryJS_TextArea.$spryJS_Select.$spryJS_CheckBox.$spryJS_Radio.$spryJS_Confirm;
			$prep .= "\n".$spryCSS_TextField.$spryCSS_Password.$spryCSS_TextArea.$spryCSS_Select.$spryCSS_CheckBox.$spryCSS_Radio.$spryCSS_Confirm."\n";
		}		
		echo $prep;
	}

	//Returns stylesheet link to form css
	public static function styleForm($ui=''){
		if(!isEmpty($ui)){$ui = $ui.'-';} $ui = pathTo('styles').$ui;
		echo'<link rel="stylesheet" media="all" href="'.$ui.'form.css">'."\n";
	}

} #End of class - Erko
?>