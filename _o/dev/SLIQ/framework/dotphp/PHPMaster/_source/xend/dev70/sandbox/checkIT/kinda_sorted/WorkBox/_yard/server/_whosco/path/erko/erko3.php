<?php
/* erko3™ framework ~ an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website;
 * Built by SlimEdge™ [@officialSEID - www.seid.com.ng] using PHP, HTML, CSS, JS & derived technology.
 * © July 2016 | version 1.0
 * ===================================================================================================================
 * Dependency »
 * PHP | index::erko3 ~ framework engine
 */

class erko3 {
	private static $instance;
	
	public static $config;
	
	public static $name;
	public static $squat;
	public static $brand;
	public static $slogan;
	public static $acronym;

	public static $baseui;
	public static $basetag;
	public static $basepath;
	public static $basemail;
	public static $basephone;
	public static $basedomain;

	public static $webmaster;

	
	// Prevent multiple instances of the class
	protected function __construct(){
		return;
	}


	// Returns an instance of the class
	public static function instantiate(){
		if(is_null(self::$instance)){
			self::$instance = new self();
		}

		return self::$instance;
	}


	// set varibles
	public static function setting($data){
		if(!empty($data) && !is_array($data)){return print_msg('U-tydi3/01|01');}

		#prepare
		if(!empty($data)){
			self::$config = $data;
			foreach ($data as $label => $value){
				$valid_labels = array(
					'name','squat', 'brand', 'slogan', 'acronym',
					'baseui', 'basetag', 'basepath', 'basemail', 'basephone', 'basedomain', 'webmaster');
				
				#validate $label, set value
				if(in_array($label, $valid_labels)){
					if(!empty($value)){self::$$label = $value;}
				}
			}
		}

		if(empty(self::$basemail)){self::$basemail = 'info';}
		if(empty(self::$webmaster)){self::$webmaster = 'admin';}

		if(!inString(self::$basemail, '@')){self::$basemail = self::$basemail.'@'.self::domain();}
		if(!inString(self::$webmaster, '@')){self::$webmaster = self::$webmaster.'@'.self::domain();}
	}


	// Return base url
	public static function baseURL(){
		if(!empty(self::$basedomain)){$task = self::$basedomain;}
		else {$task = $_SERVER['HTTP_HOST'];}
		return strtolower($task);
	}


	// Return domain name
	public static function domain(){
		$domain = url2domain(self::baseURL());
		return strtolower($domain);
	}


	// Return domain url
	public static function domainURL(){
		$domain = self::domain();
		#search for protocols in string
		$protocol ='';
		if(inString(self::baseURL(), 'https')){$protocol .='https://';}
		elseif(inString(self::baseURL(), 'http')){$protocol .='http://';}
		elseif (isset($_SERVER["HTTPS"]) && strtolower($_SERVER["HTTPS"] ) == "on"){$protocol .='https://';}
		else {$protocol .='http://';}
		if(inString(self::baseURL(), 'www.')){$protocol .='www.';}

		return strtolower($protocol.$domain);
	}


	// Return site path
	public static function site(){
		$url = self::domainURL();
		if(!empty(self::$basepath)){$url .= PS.self::$basepath;}
		
		return $url;
	}


	// Return remote directory
	public static function getRD(){
		$dir = stringSwap($_SERVER['DOCUMENT_ROOT'], DS, '', 'last');
		if(!empty(self::$basepath)){$dir .= DS.self::$basepath;}
		
		return strtolower($dir);
	}





/**
 * ---------------------------------------------------------------------------
 *  This section is for LOADER operations
 * ---------------------------------------------------------------------------
 */
	
	// Return page name as determined by url
	public static function page($return='name'){
		$page = 'index';
		if(isset($_GET['page']) && !empty($_GET['page'])){
			$page = $_GET['page'];
		}

		#convert '/' to '_' {changing possible 'support/faq' to 'support_faq'}
		if(inString($page, '/')){$page = stringSwap($page, '/', '_');}

		#find the last occurence of '_' and check if there is content after it.
		$last = posChar($page, '_', 'last');
		$length = strlen($page);
		if($length == $last && $return == 'name'){
			$page = stringSwap($page, '_', '', 'last');
		}				
		
		return strtolower(trim($page));
	}


	// Prepare content {determine & return file location}
	protected static function prepare($content, $type='', $separator='DS'){
		$content = strtolower($content);
		$type = strtolower($type);

		#prepare & return result
		$result = '';
		if($type == 'slice'){$result .= SLICE;}
		elseif($type == 'page'){$result .= VIEW;}		
		elseif($type == 'plug'){$result .= PLUG;}
		else {$result .= SOURCE;}	
		$result .= constant(strtoupper($separator));
		$result .= $content.'.php';
		
		return strtolower($result);
	}


	// Load file content
	public static function content($content='', $type='slice'){
		$file = self::prepare($content, $type, 'DS');
		if($file){
			if(is_file($file)){
				#load file
				include_once($file);
				return;
			}
			else {
				#return 'Not Found' error
				$document['name'] = $content;
				$document['file'] = $file;
				$document['type'] = $type;
				if($type == 'page'){return notFound($document);}
				else {
					$notice = '<p>Missing '.strtoupper($type).' ['.$content.']</p>';
					notify($notice);
					if(SET_MODE == 'development'){
						$notice = '<pre><tt>';
						$notice .= '<b>Name:</b> '.$content."\t";
						$notice .= '<b>Type:</b> '.$type."\t";
						$notice .= '<b>File:</b> '.$file;
						$notice .= '</tt></pre>';
						echo $notice;
					}
					return;
				}
			}
		}

		#return error message
		return printMsg('unable to prepare '.strtoupper($type).' file for ['.$content.']');
	}


	//build meta {description & keywords} for page
	protected static function buildMeta($type, $page=''){
		$data = array('description', 'keywords');
		if(!in_array($type, $data)){
			$msg = 'invalid arguments on '.__FUNCTION__.'()';
 			return printMsg($msg);
 		}

		#prepare task
		if(empty($page)){$page = self::page();}
		$meta = self::$config[strtolower($type)];
		if($type=='description'){$separator  = ' - ';}
		if($type=='keywords'){$separator = ', ';}

		$metaInfo = '';
		if(!isEmpty(self::$brand)){$metaInfo .= self::$brand;}

		#if description or keyword(s) exist for page
		if(!empty($meta) && array_key_exists($page, $meta)){
			$metaInfo .= $separator.$meta[$page];
		}
		else {#use default Slogan & Tags
			if($type=='description' && !empty(self::$slogan)){
				$metaInfo .= $separator.self::$slogan;
			}
			if($type=='keywords'){
				if(!empty(self::$basetag)){
					$metaInfo .= $separator.self::$basetag;
				}
				elseif($page != 'index'){
					$metaInfo .= $separator.sentence(cleanup($page));
				}
				elseif(!isEmpty(self::$name)){
					$metaInfo .= $separator.self::$name;
				}
			}
		}

		#RETURN
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
		elseif(getBrowser()=='operamini' || getBrowser()=='operamobi'){
			$doctype = '<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">';
		}
		else {$doctype = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">';}
			
		echo $doctype."\n";
	}


	//Returns valid charset
	public static function charset(){
 		if(!isIE('<=', 9)){$charset ='<meta charset="utf-8">';}
 		else {$charset ='<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';} 
 		
 		echo $charset."\n";
 	}


	//Returns viewport
 	public static function viewport(){
 		if(
 			(Device::identify() == 'phone' && Device::is() == 'phone') ||
 			(Device::identify() == 'tablet' && (Device::is() == 'tablet' || Device::is() == 'phone'))
 			){
			echo '<meta name="viewport" content="width=device-width">'."\n";
		}
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
			$page = self::page();
			$title = self::$config['title'];
			
			$pageTitle = '';

			#if title exist for page in global configuration
			if(!empty($title) && array_key_exists($page, $title)){
				$pageTitle .= $title[$page];
			}
			else {
				#build title for index page {making sure site name exist}
				if($page == 'index' && !empty(self::$name)){
					$pageTitle .= 'Welcome to '.self::$name;
				}
				else {
					#build title for other page
					$pageTitle .= capitalize(cleanup($page));

					#add site brand or site name
					if(!empty(self::$brand)){
						if(!empty($pageTitle)){$pageTitle .= ' :: ';}
						$pageTitle .= self::$brand;

						#add slogan
						if(!empty(self::$slogan)){$pageTitle .= ' - '.sentence(self::$slogan);}
					}
				}
			}
		}
		else {$pageTitle = $value;}
		
		echo sentence($pageTitle);
	}


	//Returns meta information
	public static function meta($distribution='global', $follow='follow'){
 		$meta = '';

 		if($distribution != 'nope'){$meta .= '<meta name="distribution" content="'.$distribution.'">'."\n";}

 		$meta .= '<meta name="description" content="'.self::buildMeta('description').' - '.self::domain().'">'."\n";
		$meta .= '<meta name="keywords" content="'.self::buildMeta('keywords').'">'."\n";
		if($follow == 'follow'){$robots ='index, follow';} else {$robots = 'index, nofollow';}
		$meta .= '<meta name="robots" content="'.$robots.'">'."\n";

		$device = Device::identify(); #identify the actual device {irespective of the selected device}
		if($device == 'desktop'){$meta .= '<meta name="format-detection" content="telephone=no">'."\n";}

		echo $meta;
	}


	//Returns favicon
	public static function favicon($path=''){
		#prepare & resolve
		$version = '';
		if(SET_MODE != 'production'){$version = '?version='.mt_rand();}

		if(isEmpty($path)){$path = pathTo('icon');}
		
		if(getBrowser()=='ie'){
			$favicon ='<link rel="shortcut icon" type="image/x-icon" href="'.$path.'favicon.ico'.$version.'">'."\n";
		} elseif(getBrowser()=='operamobi' || getBrowser()=='operamini'){
			$favicon ='<link rel="icon" type="image/x-icon" href="'.$path.'favicon.ico'.$version.'">'."\n";
		} else {$favicon ='<link rel="icon" type="image/png" href="'.$path.'favicon.png'.$version.'">'."\n";}
		
		if(Device::identify() != 'desktop'){
			$favicon .='<link rel="apple-touch-icon-precomposed" href="'.$path.'apple-touch-icon-precomposed.png'.$version.'">'."\n";
			$favicon .='<link rel="apple-touch-icon" sizes="72x72" href="'.$path.'apple-touch-icon-72x72.png'.$version.'">'."\n";
			$favicon .='<link rel="apple-touch-icon" sizes="114x114" href="'.$path.'apple-touch-icon-114x114.png'.$version.'">'."\n";
			$favicon .='<link rel="apple-touch-icon" sizes="144x144" href="'.$path.'apple-touch-icon-144x144.png'.$version.'">'."\n";
		}

		echo $favicon;
	}


	//Returns stylesheet link
	public static function stylesheet($flex='device', $ui='auto'){
		#prepare & resolve
		$version = '';
		if(SET_MODE != 'production'){$version = '?version='.mt_rand();}

		#set device
		if($flex !='device' && !isEmpty($flex)){$device = $flex;}
		else {
			$device = Device::is();
			if(isIE('<=', 9)){$device ='ie';}
			if($device == 'phone'){$device ='small';}
			elseif($device == 'tablet'){$device ='medium';}
			else {$device ='large';}
		}
		

		#set baseui
		if($ui == 'auto' && !isEmpty(self::$baseui)){$ui = self::$baseui;} else {$ui = '';}
		if(!isEmpty($ui)){$ui = $ui.'-';}		
		$ui = pathTo('styles').$ui;

		#prepare & return result
		$stylesheet = '<link rel="stylesheet" type="text/css" href="'.pathTo('styles').'clear.css'.$version.'">'."\n";

		if($flex == 'device' || $flex == 'mquery'){
			$stylesheet .='<link rel="stylesheet" type="text/css" media="all" href="'.$ui.'global.css'.$version.'">'."\n";
		}

		if($flex != 'mquery'){
			$stylesheet .='<link rel="stylesheet" type="text/css" href="'.$ui.strtolower($device).'.css'.$version.'">'."\n";
		} else {
			$stylesheet .='<link rel="stylesheet" type="text/css" media="screen and (max-width: 480px)" href="'.$ui.'small.css'.$version.'">'."\n";
			$stylesheet .='<link rel="stylesheet" type="text/css" media="only screen and (min-width:481px) and (max-width:768px)" href="'.$ui.'medium.css'.$version.'">'."\n";
			$stylesheet .='<link rel="stylesheet" type="text/css" media="only screen and (min-width:769px)" href="'.$ui.'large.css'.$version.'">'."\n";
		}
	
		if(isIE('<=', 6)){$stylesheet .='<style type="text/css"> .group {height: 1%;}</style>'."\n";}
		elseif(isIE('==', 7)){$stylesheet .='<style type="text/css"> .group {display:inline-block;}</style>'."\n";}
		
		echo $stylesheet;
	}


	//Returns stylesheet link
	public static function js($path='', $responsive='sure'){
		#prepare & resolve
		$version = '';
		if(SET_MODE != 'production'){$version = '?version='.mt_rand();}

		if(isEmpty($path)){$path = pathTo('javascript');}

		$javascript ='<script type="text/javascript" src="'.$path.'jquery.js"></script>'."\n";
		if(isIE('<', 9)){
			$javascript .='<script type="text/javascript" src="'.$path.'html5.js"></script>'."\n";
			$javascript .='<script type="text/javascript" src="'.$path.'selectivizr.js"></script>'."\n";
		}
		
		if($responsive == 'sure'){
			if(!isIE('<', 9)){$javascript .='<script type="text/javascript" src="'.$path.'responsive-nav.js"></script>'."\n";}
			$javascript .='<script type="text/javascript" src="'.$path.'responsiveslides.js"></script>'."\n";
		}
		
		echo $javascript;
	}


	//Returns spry link
	public static function spry($sprySet='', $set_path=''){
		if(isEmpty($set_path)){$path['js'] = pathTo('javascript'); $path['css'] = pathTo('styles');}
		else {$path['js'] = $set_path; $path['css'] = $set_path;}

		$spryJS_TextField ='<script type="text/javascript" src="'.$path['js'].'SpryValidationTextField.js"></script>'."\n";
		$spryJS_Password ='<script type="text/javascript" src="'.$path['js'].'SpryValidationPassword.js"></script>'."\n";
		$spryJS_TextArea ='<script type="text/javascript" src="'.$path['js'].'SpryValidationTextarea.js"></script>'."\n";
		$spryJS_Select ='<script type="text/javascript" src="'.$path['js'].'SpryValidationSelect.js"></script>'."\n";
		$spryJS_CheckBox ='<script type="text/javascript" src="'.$path['js'].'SpryValidationCheckbox.js"></script>'."\n";
		$spryJS_Radio ='<script type="text/javascript" src="'.$path['js'].'SpryValidationRadio.js"></script>'."\n";
		$spryJS_Confirm ='<script type="text/javascript" src="'.$path['js'].'SpryValidationConfirm.js"></script>'."\n";

		$spryCSS_TextField ='<link rel="stylesheet" type="text/css" href="'.$path['css'].'SpryValidationTextField.css">'."\n";
		$spryCSS_Password ='<link rel="stylesheet" type="text/css" href="'.$path['css'].'SpryValidationPassword.css">'."\n";
		$spryCSS_TextArea ='<link rel="stylesheet" type="text/css" href="'.$path['css'].'SpryValidationTextarea.css">'."\n";
		$spryCSS_Select ='<link rel="stylesheet" type="text/css" href="'.$path['css'].'SpryValidationSelect.css">'."\n";
		$spryCSS_CheckBox ='<link rel="stylesheet" type="text/css" href="'.$path['css'].'SpryValidationCheckbox.css">'."\n";
		$spryCSS_Radio ='<link rel="stylesheet" type="text/css" href="'.$path['css'].'SpryValidationRadio.css">'."\n";
		$spryCSS_Confirm ='<link rel="stylesheet" type="text/css" href="'.$path['css'].'SpryValidationConfirm.css">'."\n";

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
		if(!isEmpty($ui)){$ui = $ui.'-';}
		$ui = pathTo('styles').$ui;
		$prep ='<link rel="stylesheet" type="text/css" media="all" href="'.$ui.'form.css">'."\n";
		
		echo $prep;
	}

} #End of class - Session
?>