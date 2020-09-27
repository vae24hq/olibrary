<?php
/* erko™ framework ~ an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website;
 * Built by DeronEllse™ [@deronellse - www.deronellse.com/about] using PHP, MySQL, HTML, CSS, JS & derived technology.
 * © February 2016 | version 1.0
 * ===================================================================================================================
 * Dependency »
 * PHP | erko::core ~ main class
 */

class erko {
	private static $instance;

	public static $link;
	public static $link_type;

	public static $name;
	public static $squat;
	public static $brand;
	public static $slogan;
	public static $acronym;

	public static $baseui;
	public static $baseurl;
	public static $basekeywords;
	public static $basepath;
	public static $basemail;
	public static $basephone;

	public static $mailadmin;

	public static $dev_url;
	public static $dev_name;
	public static $dev_brand;
	public static $dev_email;

	public static $use_db = 'no';
	public static $db;
	public static $db_user;
	public static $db_password;
	public static $db_host;
	public static $db_extension;

	public static $trans_img = '.png';


	//Returns an intantiate of class
	public static function instantiate(){
		if(is_null(self::$instance)){
			self::$instance = new self();
		}
		return self::$instance;
	}


	//Set varibles
	public static function setting($data=''){
		if(!is_empty($data) && !is_array($data)){return print_msg('U-Erko/01|01');}

		$linkInfo = grab_link('both');
		if($linkInfo && is_array($linkInfo)){
			self::$link = strtolower($linkInfo['uri']);
			self::$link_type = strtolower($linkInfo['type']);
		}

		#SET DEFAULT
		self::$baseui = 'index';
		self::$basepath = '';

		//database default
		self::$db = 'erkodb';
		self::$db_user = 'root';
		self::$db_password = '';
		self::$db_host = 'localhost';
		self::$db_extension = 'MySQLi';

		//more
		if(validate_ie('==', 6)){self::$trans_img = '-ie6.gif';}

		#PREPARE
		if(!empty($data)){
			foreach ($data as $label => $value){
				$valid_labels = array(
					'name','squat', 'brand', 'acronym', 'slogan',
					'baseui', 'baseurl', 'basekeywords', 'basepath', 'basemail', 'basephone', 'mailadmin',
					'dev_url', 'dev_name', 'dev_brand', 'dev_email', 'use_db');
				$valid_db_labels = array('db', 'db_user', 'db_password', 'db_host', 'db_extension');
				//validate $label, set value
				if(in_array($label, $valid_labels)){
					if(!is_empty($value)){self::$$label = $value;}
				}

				if(in_array($label, $valid_db_labels)){
					if(!is_empty($value)){self::$$label = $value;}
					if(self::$use_db=='no'){self::$use_db = 'yeah';}
				}
			}
		}

		if(empty(self::$basemail)){self::$basemail = 'info@'.self::domain_name();}
		if(empty(self::$mailadmin)){self::$mailadmin = 'admin@'.self::domain_name();}
		if(empty(self::$dev_url)){self::$dev_url = 'http://www.deronellse.com';}
		if(empty(self::$dev_name)){self::$dev_name = 'DeronEllse';}
		if(empty(self::$dev_brand)){self::$dev_brand = 'DeronEllse™';}
		if(empty(self::$dev_email)){self::$dev_email = 'info@'.url2domain(self::$dev_url);}
	}

	
	//Return baseurl
	public static function baseurl(){
		if(!empty(self::$baseurl)){$task = self::$baseurl;}
		else {$task = $_SERVER['HTTP_HOST'];}
		return strtolower($task);
	}

	
	//Return domain name
	public static function domain_name(){
		$domain = url2domain(self::baseurl());
		return strtolower($domain);
	}

	
	//Return domain url
	public static function domain_url(){
		$domain = self::domain_name();
		//search for protocols in string
		$protocol ='';
		if(in_string(self::baseurl(), 'https')){$protocol .='https://';}
		elseif(in_string(self::baseurl(), 'http')){$protocol .='http://';}
		elseif (isset($_SERVER["HTTPS"]) && strtolower($_SERVER["HTTPS"] ) == "on"){$protocol .='https://';}
		else {$protocol .='http://';}
		if(in_string(self::baseurl(), 'www.')){$protocol .='www.';}

		return strtolower($protocol.$domain);
	}

	
	//Return site url
	public static function site_url(){
		$url = self::domain_url();
		if(!empty(self::$basepath)){$url .= PS.self::$basepath;}
		return $url;
	}

	
	//Return remote directory
	public static function remote_dir(){
		$dir = string_swap($_SERVER['DOCUMENT_ROOT'], DS, '', 'last');
		if(!empty(self::$basepath)){$dir .= DS.self::$basepath;}
		return strtolower($dir);
	}


	// LOADER OPERATION SECTION
	public static function module(){
		#PREPARE
		if(self::$link_type=='default'){$task ='index';}
		elseif(self::$link_type!='link'){$task = self::$link_type;}
		else {
			$task = self::$link;
			//check if link has operation mark
			$hasOpMark = in_string(self::$link, '_');
			if($hasOpMark){//yes, it has operation mark
				//determine module
				$module = string_before($task, '_', 'yeah');
				if(strlen($module)<1){$task ='index';}
				else {$task = $module;}
			}

			//check if link has action mark
			$hasActMark = in_string($task, '!');
			if($hasActMark){//yes, it has operation mark
				//determine action
				$action = string_after($task, '!', 'yeah');
				if(!empty($action)){$task = string_before($task, '!', 'yeah');} //strip action
				else {$task = string_swap($task, '!', '');}
			}
		}

		//clean up
		if($task=='-' || $task=='_' || empty($task) || $task=='default'){$task ='index';}

		#RETURN
		return strtolower($task);
	}

	public static function operation(){
		#PREPARE
		if(self::$link_type=='default'){$task ='index';}
		else {
			if(self::$link=='default'){$task ='index';}
			else {
				$task = self::$link;
				$hasAction = in_string($task, '!'); #check if string has action
				if($hasAction){
					$stripAction = string_before($task, '!', 'yeah'); #check for action
					if($stripAction){$task = $stripAction;} else {$task ='index';}
				}

				if($task!='index'){
					if(self::module()!='index'){//if module is not default, find it in the link & strip it
						$task = string_swap($task, self::module(), '', 'first');
					}
					if(strlen($task)<1){$task ='index';}
					else {
						if(self::$link_type=='link' || self::$link_type=='app'){$task = string_swap($task, '_', '', 'first');}
						else {$task = string_swap($task, '_', '-', 'first');}
					}
				}

				if(strlen($task)<1){$task ='index';}
				else {$task = string_swap($task, '_', '-');}
			}
		}

		if(strlen($task)<1){$task ='index';}

		//clean up
		if($task=='-' || $task=='_' || is_empty($task) || $task=='default'){$task ='index';}

		//remove -index from name
		$task = string_swap($task, '-index', '');

		#RETURN
		return strtolower($task);
	}

	public static function action(){
		$action ='default';
		$hasAction = string_after(self::$link, '!', 'yeah');
		if($hasAction){$action = $hasAction;}
		if(strlen($action)<1){$action ='default';}

		#RETURN
		return strtolower($action);
	}

	public static function MOA($module='', $operation='', $action=''){
		#SANCTION
		if(is_empty($module)){$module = self::module();}
		if(is_empty($operation)){$operation = self::operation();}
		if(is_empty($action)){$action = self::action();}

		$content['module'] = strtolower($module);
		$content['operation'] = strtolower($operation);
		$content['action'] = strtolower($action);
		return $content;
	}

	public static function prepare($type='page', $content='auto'){
		#SANCTION
		if(is_empty($type) || is_empty($content)){
			$msg = ' one or more required arguements in '.__METHOD__.'() is empty';
 			return print_msg('U-erko/03|01',$msg);
 		}

		$task ='';

		#PREPARE ~type location
		if($type=='api'){$typeLocation = API;}
		if($type=='layout'){$typeLocation = LAYOUT;}
		if($type=='model'){$typeLocation = MODEL;}
		if($type=='organizer' || $type=='link' || $type=='redirect' || $type=='download'){$typeLocation = ORGANIZER;}
		if($type=='page' || $type=='view'){$typeLocation = VIEW;}
		if($type=='piece'){$typeLocation = PIECE;}


		#PREPARE ~content basepath
		if($content=='auto'){
			if($type=='layout'){
				if(!is_empty(self::$baseui)){$task .= self::$baseui;}
				else {
					$msg = 'Your default LAYOUT is not set';
					return notify($msg, 'erko-error', 'span');
				}
			}
			else {$task .= self::auto_prep_object($type);}
		}
		else {$task .= $content;}

		if(!is_empty($task)){
			# ~clean up
			$task = string_swap($task,'index_index', 'index');
			$task = string_swap($task, '_index', '');
			$task = $typeLocation.DS.$task.'.php';
			$task = string_swap($task, '-.php', '.php');
			$task = string_swap($task, '_.php', '.php');

			#RETURN
			return $task;
		}
		return FALSE;
	}

	public static function load($type='page', $content='auto'){
		$prepare = self::prepare($type, $content);
		$moa = self::MOA();

		if($prepare){
			if($content=='auto'){
				$document = '';
				if($type !='page'){$document = $moa['module'].'_';}
				$document .= $moa['operation'];
			}

			if(found_file($prepare)){include($prepare);}
			else {
				$typesOff = array('page', 'view');
				if(in_array($type, $typesOff)){
					not_found(strip_clean($document));
				}
				else {
					$msg = 'Missing ['.$type.' - '.$document.']';
					notify($msg, 'erko-error', 'p');
				} 

				if(defined('DEVELOPMENT_STAGE') && DEVELOPMENT_STAGE == 'yeah'){
					$msg = 'The document ['.$prepare.'] is unavaliable';
					return notify($msg, 'notice', 'p');
				}
			}
		} else{
			$msg = 'Loading Failed: The function to prepare your request returned false!';
			if(defined('DEVELOPMENT_STAGE') && DEVELOPMENT_STAGE == 'yeah'){
				$msg .= '<br> load(type='.$type.', content='.$content.')';
			}

			return notify($msg, 'erko-error', 'span');
		}
	}

	public static function run_app(){
		#PREPARE
		$task = '';
		$show = grab_link('type');
		if($show != 'default'){return self::load($show);}
		else {return self::load();}
	}

	public static function layout($data='auto'){
		if(empty($data)){notify('cannot load layout without data', 'erko-error', 'p');}
		elseif($data=='auto'){return self::load('layout');}
		else {
			$task = LAYOUT.DS.$data.'.php';
			return add_file($task);
		}
	}

	public static function piece($data=''){
		if(empty($data)){notify('cannot load piece without data', 'erko-error', 'p');}
		else {
			$task = PIECE.DS.$data.'.php';
			return add_file($task);
		}
	}

	public static function view($data='auto'){
		if(empty($data)){notify('cannot load view without data', 'erko-error', 'p');}
		elseif($data=='auto'){return self::load('view');}
		else {
			$task = VIEW.DS.$data.'.php';
			return add_file($task);
		}
	}

	public static function page($data='auto'){
		if(empty($data)){notify('cannot load page without data', 'erko-error', 'p');}
		elseif($data=='auto'){return self::load('page');}
		else {
			$task = VIEW.DS.$data.'.php';
			return add_file($task);
		}
	}

	public static function api($data='auto'){
		if(empty($data)){notify('cannot load api without data', 'erko-error', 'p');}
		elseif($data=='auto'){return self::load('api');}
		else {
			$task = API.DS.$data.'.php';
			return add_file($task);
		}
	}

	public static function model($data='auto'){
		if(empty($data)){notify('cannot load model without data', 'erko-error', 'p');}
		elseif($data=='auto'){return self::load('model');}
		else {
			$task = MODEL.DS.$data.'.php';
			return add_file($task);
		}
	}

	public static function organizer($data='auto'){
		if(empty($data)){notify('cannot load organizer without data', 'erko-error', 'p');}
		elseif($data=='auto'){return self::load('organizer');}
		else {
			$task = ORGANIZER.DS.$data.'.php';
			return add_file($task);
		}
	}

	public static function return_value($data=''){
		if(empty($data)){return false;}
		else {$task = self::auto_prep_object($data);}
		return $task;
	}



	// PRIVATE OPERATION SECTION
	private static function meta_data($data='description'){

		#ERROR CHECK
 		if(is_empty($data)){return print_msg('u-Erko/02|01');}

		$dataset = array('description', 'keywords');
		if(!in_array($data, $dataset)){return print_msg('u-Ekro/02|02');}

		#PREPARE
		global $config;
		$meta = self::operation();
		$task = '';

		if(!is_empty(self::$brand)){$task .= self::$brand;}

		$taskData = $config[strtolower($data)];
		$metaData = $taskData;

		if(!empty($metaData) && array_key_exists($meta, $metaData)){
			if($data=='description'){$task .= ' - ';}
			if($data=='keywords'){$task .= ', ';}
			$task .= $metaData[$meta];
		}
		else { //use default Tagline & Tags
			if($data=='description' && !empty(self::$slogan)){$task .= ' - '.self::$slogan;}
			if($data=='keywords'){
				if(!empty(self::$basetag)){$task .= ', '.ucwords(self::$basetag);}
				elseif(self::module()=='page' && self::return_value('page') !='index'){
					$task .= ', '.clean_cap(self::return_value('page'));
				}
			}
		}

		#RETURN
		return $task;
	}

	private static function auto_prep_object($type='page'){
		$content = self::MOA(); $task = '';
		if($type=='api'){
			if($content['module'] !='api'){$task .= $content['module'].'_';}
			$task .= $content['operation'];
		}
		elseif($type=='link'){
			if($content['module'] !='index'){$task .= $content['module'];}
		}
		elseif($type=='page'){
			if($content['module'] !='index' && $content['module'] !='page'){$task .= $content['module'].'_';}
			$task .= $content['operation'];
		}
		elseif($type=='redirect'){$task .='redirect';}
		elseif($type=='download'){$task .='download';}
		elseif($type=='model'){$task .= $content['module'];}
		elseif($type=='organizer' || $type=='view' || $type=='form' || $type=='piece'){
			$task .= $content['module'];
			if($content['operation'] !='index'){$task .= '_'.$content['operation'];}
		}
		return $task;
	}



	// IN-HEAD OPERATION SECTION
	public static function doctype($action='auto'){
		if(!validate_ie('<=', 9)){$task = '<!doctype html>';}
		#elseif(browser_info()=='operamini' || browser_info()=='operamobi'){
			#$task = '<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.2//EN" "http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd">';
		#}
		else {$task = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">';}
			
		echo $task."\n";
	}

	public static function charset(){
 		if(!validate_ie('<=', 9)){$task ='<meta charset="utf-8">';}
 		else {$task ='<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';} 
 		echo $task."\n";
 	}

 	public static function xua_compatible(){
 		$chore ='';
 		if(validate_ie('==',8)){$chore ='<meta http-equiv="X-UA-Compatible" content="IE=8" />'."\n";}
 		elseif(browser_info()=='ie'){$chore ='<meta http-eqbaseuiv="X-UA-Compatible" content="IE=edge,chrome=1">'."\n";}
 		echo $chore;
 	}

 	public static function viewport(){
		if(device::is() =='phone' || (device::is()=='tablet' && device::identify()=='tablet')){
			
			#if(browser_info()!='operamini' && browser_info()!='operamobi'){
			echo $task ='<meta name="viewport" content="width=device-width, maximum-scale=2">'."\n";
			#}
		}
	}

	public static function title($title='', $use='erko', $return='html'){

 		if($use=='monstra'){$title = baseurl::title() . ' :: ' . baseurl::name();}
 		elseif($use=='erko'){
 			if(is_empty($title)){
				global $config;
				$location = self::operation();
				$title ='';
				
				if(array_key_exists($location, $config['title'])){$title .= $config['title'][$location];}
				else {

					#PREPARE ~action's title
					$actionTitle ='';
					if(self::action()!='default'){$actionTitle = clean_cap(self::action());}

					# ~module's title
					$moduleTitle ='';
					$modules = array('api', 'page', 'download', 'redirect');;
					if(self::module()!='index'  && !in_array(self::module(), $modules)){$moduleTitle = clean_cap(self::module());}

					# ~operation's title
					$operationTitle ='';
					if(self::operation()!='index'){$operationTitle = clean_cap(string_swap(self::operation(), '~', ' '));}

					$title ='';

					if(!is_empty($moduleTitle)){$title .= clean_cap($moduleTitle);}

					if(!is_empty($operationTitle)){
						if(!is_empty($moduleTitle)){$title .=' ';}
						$title .= clean_cap($operationTitle);
					}

					if(!is_empty($actionTitle)){
						if(!is_empty($moduleTitle) || !is_empty($operationTitle)){$title .=' - ';}
						$title .= clean_up($actionTitle);
					}

					if(!is_empty(self::$name)){
						if(!is_empty($title)){
							if(self::module()=='page'){$title .=' // ';}
							else {$title .=' :: ';}
						}
						else {$title .= 'Welcome to ';}
						$title .= self::$name;
						if(!is_empty(self::$brand) && self::module()!='index' && self::operation()!='index'){$title .=' • '.self::$brand;}
					}

					if(!is_empty(self::$slogan) && self::module()!='index' && self::operation()!='index'){
						if(!is_empty($title)){$title .=' ~ ';}
						$title .= self::$slogan;
					}
				}
			}
 		}

		if($return=='html'){echo '<title>'.$title.'</title>'."\n";}
		else {return $title;}
	}

	public static function meta($use='erko', $follow='no', $distribution='global'){
 		#PREPARE
 		$task = '';
 		$task .='<meta name="distribution" content="'.$distribution.'">'."\n";

 		if($use=='erko'){
 			$task ='<meta name="description" content="'.self::meta_data('description').' - '.self::domain_name().'">'."\n";
			$task .='<meta name="keywords" content="'.self::meta_data('keywords').'">'."\n";
			if($follow=='yeah'){$robots ='index, follow';} else {$robots ='index, nofollow';}
			$task .='<meta name="robots" content="'.$robots.'">'."\n";
		}
 		if($use=='monstra'){
 			$task .='<meta name="description" content="'.baseurl::description().'">'."\n";
			$task .='<meta name="keywords" content="'.baseurl::keywords().'">'."\n";
			$task .='<meta name="robots" content="'.Page::robots().'">'."\n";
		}

		$task .='<meta name="format-detection" content="telephone=no">'."\n";

		#RETURN
		echo $task;
	}

	public static function favicon($path=''){
		//prep for $version
		$ver = '';
		if(defined('DEVELOPMENT_STAGE') && DEVELOPMENT_STAGE=='yeah'){$ver = '?version='.mt_rand();}

		#PREPARE & RESOLVE
		if(is_empty($path)){$path = path_to('icon');}
		
		if(browser_info()=='ie'){
			$chore ='<link rel="shortcut icon" type="image/x-icon" href="'.$path.'favicon.ico'.$ver.'">'."\n";
		} elseif(browser_info()=='operamobi' || browser_info()=='operamini'){
			$chore ='<link rel="icon" type="image/x-icon" href="'.$path.'favicon.ico'.$ver.'">'."\n";
		} else {$chore ='<link rel="icon" type="image/png" href="'.$path.'favicon.png'.$ver.'">'."\n";}
		
		if(device::is() !='desktop'){
			$chore .='<link rel="apple-touch-icon-precomposed" href="'.$path.'apple-touch-icon-precomposed.png'.$ver.'">'."\n";
			$chore .='<link rel="apple-touch-icon" sizes="72x72" href="'.$path.'apple-touch-icon-72x72.png'.$ver.'">'."\n";
			$chore .='<link rel="apple-touch-icon" sizes="114x114" href="'.$path.'apple-touch-icon-114x114.png'.$ver.'">'."\n";
			$chore .='<link rel="apple-touch-icon" sizes="144x144" href="'.$path.'apple-touch-icon-144x144.png'.$ver.'">'."\n";
		}

		#RETURN
		echo $chore;
	}

	public static function css($flex='device', $ui='auto'){
		//prep for $version
		$ver = '';
		if(defined('DEVELOPMENT_STAGE') && DEVELOPMENT_STAGE=='yeah'){$ver = '?version='.mt_rand();}

		//prep for $device
		if(!is_empty($flex) && $flex !='layout'){
			$device = device::is();
			if(validate_ie('<=', 9)){$device ='ie';}
			elseif($flex=='device'){
				if($device=='phone'){$device ='small';}
				elseif($device=='tablet'){$device ='medium';}
				else {$device ='large';}
			}		
			elseif(!is_empty($flex) && $flex != 'mquery'){$device = $flex;}
		}		
		elseif($flex =='layout'){$device ='layout';}		
		

		//prep for $baseui
		if($ui=='auto'){
			if(self::$baseui !='index'){$ui = self::$baseui;}
			else {$ui = '';}			
		}
		if(!is_empty($ui)){$ui = $ui.'-';}
		
		$ui = path_to('css').$ui;

		//prep for $chore
		$chore = '';
		$chore .='<link rel="stylesheet" type="text/css" href="'.path_to('css').'clear.css'.$ver.'">'."\n";
		$chore .='<link rel="stylesheet" type="text/css" href="'.$ui.'base.css'.$ver.'">'."\n";

		//load css layout for device or browser
		if(!is_empty($flex) && $flex !='mquery'){
			$chore .='<link rel="stylesheet" type="text/css" href="'.$ui.strtolower($device).'.css'.$ver.'">'."\n";
		} elseif ($flex =='mquery'){
			$chore .='<link rel="stylesheet" type="text/css" media="screen and (max-width: 480px)" href="'.$ui.'small.css'.$ver.'">'."\n";
			$chore .='<link rel="stylesheet" type="text/css" media="only screen and (min-width:481px) and (max-width:768px)" href="'.$ui.'medium.css'.$ver.'">'."\n";
			$chore .='<link rel="stylesheet" type="text/css" media="only screen and (min-width:769px)" href="'.$ui.'large.css'.$ver.'">'."\n";
		}
		
		if(validate_ie('<=', 6)){$chore .='<style type="text/css"> .group {height: 1%;}</style>'."\n";}
		elseif(validate_ie('==', 7)){$chore .='<style type="text/css"> .group {display:inline-block;}</style>'."\n";}
		echo $chore;
	}

	public static function js($path=''){
		if(empty($path)){$path = path_to('js');}
		$chore ='<script type="text/javascript" src="'.$path.'jquery.js"></script>'."\n";
		if(validate_ie('<', 9)){
			$chore .='<script type="text/javascript" src="'.$path.'html5.js"></script>'."\n";
			$chore .='<script type="text/javascript" src="'.$path.'selectivizr.js"></script>'."\n";
		}
		if(!validate_ie('<', 9)){$chore .='<script type="text/javascript" src="'.$path.'responsive-nav.js"></script>'."\n";}
		$chore .='<script type="text/javascript" src="'.$path.'responsiveslides.js"></script>'."\n";
		echo $chore;
	}


	public static function spry($sprySet='', $set_path=''){

		if(empty($setpath)){$path['js'] = path_to('js'); $path['css'] = path_to('css');}
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
			$prep .= "\n".$spryCSS_TextField.$spryCSS_Password.$spryCSS_TextArea.$spryCSS_Select.$spryCSS_CheckBox.$spryCSS_Radio.$spryCSS_Confirm;
		}
		echo $prep;
	}

	public static function form_css($ui=''){
		if(!is_empty($ui)){$ui = $ui.'-';}
		$ui = path_to('css').$ui;
		$prep ='<link rel="stylesheet" type="text/css" media="all" href="'.$ui.'form.css">'."\n";
		echo $prep;
	}




	// IN-BODY OPERATION SECTION
	public static function heading($h1=''){
		if(is_empty($h1)){
			$h1 = '';
			$location ='';
			if(self::module() != 'index' && self::module() != 'page'){$location .= clean_up(self::module());}
			$location .= '_';
			if(self::operation() != 'index'){$location .= clean_cap(self::operation());}

			if($location == '_'){$location = 'index';}

			if($location != 'index'){
				$h1 .= string_swap($location, '_', ' '); $h1 = trim($h1);
				$h1 .= ' :: ';
			}
			$h1 .= self::$name;
			if(!is_empty(self::$slogan)){$h1 .= ' - '.self::$slogan;}			
			$h1 = trim($h1);
		}
		echo '<h1 class="hide">'.$h1.'</h1>'."\n";
	}

	public static function date(){
		$device = device::is();
		$date = do_date();
		if($device=='tablet'){$date = do_date('dateD3');}
		if($device=='phone'){$date = do_date('dateD1');}
		return $date;
	}

	public static function breadcrumb($crumb=''){
		if(empty($crumb)){
			$crumb = ''; $brand = self::$name; $module =''; $operation ='';

			if(self::module() == 'index' && self::operation() == 'index'){$crumb .= 'Welcome to ';}

			// prepare brand
			if(device::is()=='phone'){
				if(!is_empty(self::$squat)){$brand = string_swap(self::$squat, 'imited', 'td');}
			}
			elseif(device::is()=='tablet'){
				if(!is_empty(self::$name)){$brand = string_swap(self::$name, 'imited', 'td');}
			}
			else {
				if(self::module() == 'index' && self::operation() == 'index'){
					if(!is_empty(self::$name)){$brand = self::$name;}
				}
				else {
					if(!is_empty(self::$brand)){$brand = self::$brand;}
				}
			}

			$crumb .='<a href="'.path_to().'" title="'.self::$squat.'" class="brand">'.$brand.'</a>';

			if(self::module() != 'index' && self::module() != 'page'){$module = clean_up(self::module());}
			if(self::operation() != 'index'){$operation = clean_up(self::operation());}
		}

		if(!is_empty($module) || !is_empty($operation)){$crumb .=' »';}
		if(!is_empty($module)){$crumb .=' '.clean_cap($module);}
		if(!is_empty($operation)){$crumb .=' '.clean_cap($operation);}
		return $crumb;
	}

	public static function greeting($remark='no'){
		#PREPARE
		$hour = date("H");
		if($hour<12){$chore = 'Good Morning!';}
		elseif($hour<17){$chore = 'Good Afternoon!';}
		else {$chore = 'Good Evening!';}

		if($remark=='yeah'){
			$hasRemark = FALSE;
			if($hour>2 && $hour<7){$hasRemark = "You're up early";}
			elseif($hour>21 || $hour<3){$hasRemark = "You're up late";}
			if($hasRemark){$chore = $hasRemark.' - <em>'.$chore.'</em>';}
		}

		#RETURN
		return $chore;
	}

	public static function copyright($from='none', $reserved='no', $to='now'){
		#PREPARE
		if(is_empty($from) || $from =='none'){$from = '';} #TO DO (make sure entry is valid date)
		if(is_empty($to) || $to =='now'){$to = date("Y");}

		$copyright ='';
		if(device::is()=='desktop' && is_empty($from)){$copyright .='Copyright';}
		$copyright .=' &copy;';
		$prepLink ='';
		$prepLink ='<a href="'.path_to().'" class="brand"';
		$prepLink .=' title="'.self::$name;
		$prepLink .='">';

		$brand ='';
		if(device::is()=='phone'){
			$brand .= $prepLink;
			if(!is_empty(self::$brand)){$brand .=self::$brand;}
		}
		elseif(device::is()=='tablet'){
			$brand .= $prepLink;
			$brand .= string_swap(self::$name, 'imited', 'td');
		}
		else{$brand .= $prepLink.self::$name;}

		$brand .='</a>';

		if(is_empty($from)){$chore = $copyright.' '.$to.' '.$brand;}
		else {$chore = $brand.' '.$copyright.' '.$from.' - '.$to;}
		if(!is_empty($reserved) && $reserved =='yeah'){$chore .= ' All rights reserved';}

		#DISPLAY RESULT
		return $chore;
	}

	public static function developer($brand='', $url='', $name=''){
		if(is_empty($brand)){$brand = self::$dev_brand;}
		if(is_empty($url)){$url = self::$dev_url;}
		if(is_empty($name)){$name = self::$dev_name;}

		$prep = '<a href="'.$url.'" title="'.$name.'" target="_blank" class="brand">'.$brand.'</a>';
		return $prep;
	}

	public static function slide_img($name='1', $caption='', $alt=''){
		if(is_empty($alt) && !is_empty($name)){$alt = $name;}
		$slideapend = 'slide';
		if(device::is()=='phone'){$slideapend .='-phone';}
		if(device::is()=='tablet'){$slideapend .='-tablet';}
		if(device::is()=='desktop'){$slideapend .='-desktop';}

		$image = PATH_SLIDE.PS.$slideapend.'-'.$name.'.jpg';
		if(!found_file($image)){$image = PATH_MEDIA.PS.'slide'.$slideapend.'-'.$name.'.jpg';}
		$prep = '<img class="slides" src="'.$image.'"';
		$prep .= ' alt="'.$alt.'">';
		if(!is_empty($caption)){$prep .= '<p class="caption">'.$caption.'</p>';}
		return $prep;
	}

	public static function slide_show($data=''){
		$prep =''; $name =''; $caption =''; $alt ='';
		if(is_array($data)){
			foreach($data as $row){
				$prep .='<li>';
				if(is_array($row)){
					if(!is_empty($row['name'])){$name = $row['name'];}
					if(!is_empty($row['caption'])){$caption = $row['name'];}
					if(!is_empty($row['alt'])){$caption = $row['alt'];}
				}
				$prep .= self::slide_img($name, $caption, $alt).'</li>'."\n";
			}
		}
		echo $prep;
	}
}
?>