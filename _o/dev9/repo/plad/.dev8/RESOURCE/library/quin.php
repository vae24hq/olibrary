<?php
/* quin™ ~ a framework for rapid web development bbaseuilt by CYZA.CRE8V™ © 2015
 * Program -> quin.php - core of the framework
 * ===============================================================================
 * Reqbaseuires » ~
 */

class quin {
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

	public static function instantiate(){
		if(is_null(self::$instance)){
			self::$instance = new self();
		}
		return self::$instance;
	}

	public static function setting($data=''){
		if(!is_empty($data) && !is_array($data)){return is_msg('U-Quin/01|01');}

		$linkInfo = grab_link('both');
		if($linkInfo && is_array($linkInfo)){
			self::$link = strtolower($linkInfo['uri']);
			self::$link_type = strtolower($linkInfo['type']);
		}

		#SET DEFAULT
		self::$name = 'Quin Framework';
		self::$squat = 'Quin Framework';
		self::$brand = 'Quin™';
		self::$acronym = 'QUIN';
		self::$slogan = 'build quickly';

		self::$baseui = 'index';
		self::$basepath = '';

		//database default
		self::$db = 'quindb';
		self::$db_user = 'root';
		self::$db_password = '';
		self::$db_host = 'localhost';
		self::$db_extension = 'MySQLi';

		//more
		if(validate_ie('<', 7)){self::$trans_img = '.gif';}

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
					if(!empty($value)){self::$$label = $value;}
				}

				if(in_array($label, $valid_db_labels)){
					if(!empty($value)){self::$$label = $value;}
					if(self::$use_db=='no'){self::$use_db = 'yeah';}
				}
			}
		}

		if(empty(self::$mailadmin)){self::$mailadmin = 'admin@'.self::domain_name();}
	}

	public static function baseurl(){
		if(!empty(self::$baseurl)){$chore = self::$baseurl;}
		else {$chore = $_SERVER['HTTP_HOST'];}
		return strtolower($chore);
	}

	public static function domain_name(){
		$domain = self::baseurl();
		$domain = string_swap($domain, 'https://', '', 'first');
		$domain = string_swap($domain, 'http://', '', 'first');
		$domain = string_swap($domain, 'www.', '', 'first');
		$domain = string_swap($domain, 'en.', '', 'first');
		$domain = string_swap($domain, 'us.', '', 'first');
		$domain = string_swap($domain, '/', '', 'last');
		return strtolower($domain);
	}

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

public static function site_url(){
	$url = self::domain_url();
	if(!empty(self::$basepath)){$url .= PS.self::$basepath;}
	return $url;
}

public static function remote_dir(){
	$dir = string_swap($_SERVER['DOCUMENT_ROOT'], DS, '', 'last');
	if(!empty(self::$basepath)){$dir .= DS.self::$basepath;}
	return strtolower($dir);
}




	// LOADER OPERATION SECTION
public static function module(){
		#PREPARE
	if(self::$link_type=='default'){$chore ='index';}
	elseif(self::$link_type!='link' && self::$link_type!='app'){$chore = self::$link_type;}
	else {
		$chore = self::$link;
			//check if link has operation mark
		$hasOpMark = in_string(self::$link, '_');
			if($hasOpMark){//yes, it has operation mark
				//determine module
				$module = string_before($chore, '_', 'yeah');
				if(strlen($module)<1){$chore ='index';}
				else {$chore = $module;}
			}

			//check if link has action mark
			$hasActMark = in_string($chore, '!');
			if($hasActMark){//yes, it has operation mark
				//determine action
				$action = string_after($chore, '!', 'yeah');
				if(!empty($action)){$chore = string_before($chore, '!', 'yeah');} //strip action
				else {$chore = string_swap($chore, '!', '');}
			}
		}

		//clean up
		if($chore=='-' || $chore=='_' || empty($chore) || $chore=='default'){$chore ='index';}

		#RETURN
		return strtolower($chore);
	}

	public static function operation(){
		#PREPARE
		if(self::$link_type=='default'){$chore ='index';}
		else {
			if(self::$link=='default'){$chore ='index';}
			else {
				$chore = self::$link;
				$hasAction = in_string($chore, '!'); #check if string has action
				if($hasAction){
					$stripAction = string_before($chore, '!', 'yeah'); #check for action
					if($stripAction){$chore = $stripAction;} else {$chore ='index';}
				}

				if($chore!='index'){
					if(self::module()!='index'){//if module is not default, find it in the link & strip it
						$chore = string_swap($chore, self::module(), '', 'first');
					}
					if(strlen($chore)<1){$chore ='index';}
					else {
						if(self::$link_type=='link' || self::$link_type=='app'){$chore = string_swap($chore, '_', '', 'first');}
						else {$chore = string_swap($chore, '_', '~', 'first');}
					}
				}

				if(strlen($chore)<1){$chore ='index';}
				else {$chore = string_swap($chore, '_', '-');}
			}
		}

		if(strlen($chore)<1){$chore ='index';}

		//clean up
		if($chore=='-' || $chore=='_' || is_empty($chore) || $chore=='default'){$chore ='index';}

		#RETURN
		return strtolower($chore);
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
			return is_msg('U-quin/03|01',$msg);
		}

		$chore ='';

		#PREPARE ~type location
		if($type=='ui'){$typeLocation = UI;}
		if($type=='api'){$typeLocation = API;}
		if($type=='model'){$typeLocation = MODEL;}
		if($type=='organizer' || $type=='link' || $type=='download' || $type=='redirect'){$typeLocation = ORGANIZER;}
		if($type=='page' || $type=='view'){$typeLocation = VIEW;}
		if($type=='piece'){$typeLocation = PIECE;}

		#PREPARE ~content basepath
		if($content=='auto'){
			$content = self::MOA();
			if($type=='ui'){
				if(!is_empty(self::$baseui)){$chore .= self::$baseui;}
				else {
					$msg = 'Your default UI is not set';
					return print_msg($msg, 'error', 'span');
				}
			}
			elseif($type=='api'){
				if($content['module'] !='api'){$chore .= $content['module'].'_';}
				$chore .= $content['operation'];
			}
			elseif($type=='link' || $type=='app'){
				if($content['module'] !='index'){$chore .= $content['module'].'_';}
				$chore .= $content['operation'];
			}
			elseif($type=='page'){
				if($content['module'] !='index' && $content['module'] !='page'){$chore .= $content['module'].'_';}
				$chore .= $content['operation'];
			}
			elseif($type=='redirect'){$chore .='redirect';}
			elseif($type=='model'){$chore .= $content['module'];}
			elseif($type=='organizer' || $type=='view' || $type=='form' || $type=='piece'){
				$chore .= $content['module'];
				if($content['operation'] !='index'){$chore .= '_'.$content['operation'];}
			}
		}
		else {$chore .= $content;}

		if(!is_empty($chore)){
			# ~clean up
			$chore = string_swap($chore,'index_index', 'index');
			$chore = string_swap($chore, '_index', '');
			$chore = $typeLocation.DS.$chore.'.php';
			$chore = string_swap($chore, '-.php', '.php');
			$chore = string_swap($chore, '_.php', '.php');

			#RETURN
			return $chore;
		}
		return FALSE;
	}

	public static function load($type='page', $content='auto'){
		$prepare = self::prepare($type, $content);

		if($prepare){
			if($content=='auto'){$document = self::MOA()['operation'];}


			if(found_file($prepare)){include($prepare);}
			else {
				$typesOff = array('page', 'view');
				if(in_array($type, $typesOff)){not_found(strip_clean($document));}

				if(defined('DEVELOPMENT_STAGE') && DEVELOPMENT_STAGE == 'yeah'){
					$msg = 'The document ['.$prepare.'] is unavaliable';
					return print_msg($msg, 'notice', 'p');
				}
				else {
					$msg = 'Missing ['.$type.'::::'.$document.']';
					return print_msg($msg, 'error', 'p');
				}
			}
		} else{
			$msg = 'Loading Failed: The function to prepare your request returned false!';
			if(defined('DEVELOPMENT_STAGE') && DEVELOPMENT_STAGE == 'yeah'){
				$msg .= '<br> load(type='.$type.', content='.$content.')';
			}

			return print_msg($msg, 'error', 'span');
		}
	}

	public static function run_app(){
		#PREPARE
		$chore = '';
		$show = grab_link('type');
		if($show != 'default'){return self::load($show);}
		else {return self::load();}
	}

	public static function piece($data=''){
		if(empty($data)){print_msg('cannot load piece without data', 'error', 'p');}
		else {
			$piece = PIECE.DS.$data.'.php';
			return add_file($piece);
		}
	}


	// IN-HEAD OPERATION SECTION
	public static function charset(){
		if(device::is()=='desktop' && validate_ie('<', 9)){
			$chore ='<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		} else {$chore ='<meta charset="utf-8">';}
		echo $chore."\n";
	}

	public static function xua_compatible(){
		$chore ='';
		if(DEVELOPMENT_STAGE !='yeah'){$chore ='<meta http-eqbaseuiv="X-UA-Compatible" content="IE=edge,chrome=1">'."\n";}
		echo $chore;
	}

	public static function viewport(){
		$chore ='';
		if(device::is() !='desktop'){
			$chore ='<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=3">'."\n";
		}
		echo $chore;
	}

	public static function title($title='', $use='quin', $return='html'){

		if($use=='monstra'){$title = baseurl::title() . ' :: ' . baseurl::name();}
		elseif($use=='quin'){
			if(is_empty($title)){
				global $config;
				$location = self::module().'_'.self::operation();
				if($location == 'index_index'){$location = 'index';}
				$title ='';
				if(array_key_exists($location, $config['title'])){$title .= $config['title'][$location];}
				else {

					#PREPARE ~action's title
					$actionTitle ='';
					if(self::action()!='default'){$actionTitle = self::action();}

					# ~module's title
					$moduleTitle ='';
					$modules = array('api', 'page', 'download', 'redirect');;
					if(self::module()!='index'  && !in_array(self::module(), $modules)){$moduleTitle = self::module();}

					# ~operation's title
					$operationTitle ='';
					if(self::operation()!='index'){$operationTitle = string_swap(self::operation(), '~', ' ');}

					$title ='';

					if(!is_empty($moduleTitle)){$title .= clean_up($moduleTitle);}

					if(!is_empty($operationTitle)){
						if(!is_empty($moduleTitle)){$title .=' ';}
						$title .= clean_up($operationTitle);
					}

					if(!is_empty($actionTitle)){
						if(!is_empty($moduleTitle) || !is_empty($operationTitle)){$title .=' - ';}
						$title .= clean_up($actionTitle);
					}

					if(!is_empty(quin::$name)){
						if(!is_empty($title)){
							if(self::module()=='page'){$title .=' // ';}
							else {$title .=' :: ';}
						}
						else {$title .= 'Welcome to ';}
						$title .= quin::$name;
						if(!is_empty(quin::$brand) && self::module()!='index' && self::operation()!='index'){$title .=' • '.quin::$brand;}
					}
					if(!is_empty(quin::$slogan) && self::module()!='index' && self::operation()!='index'){
						if(!is_empty($title)){$title .=' ~ ';}
						$title .= quin::$slogan;
					}
				}
			}
		}

		if($return=='html'){echo '<title>'.$title.'</title>'."\n";}
		else {return $title;}
	}


	// PRIVATE OPERATION SECTION
	public static function meta_data($data='description'){

		#ERROR CHECK
		if(is_empty($data)){return is_msg('U-Quic/02|01');}

		$dataset = array('description', 'keywords');
		if(!in_array($data, $dataset)){return is_msg('U-Quic/02|02');}

		#PREPARE
		global $config;
		$meta = self::module().'_'.self::operation();
		if($meta == 'index_index'){$meta = 'index';}
		$task = '';

		if(!is_empty(quin::$brand)){$task .= quin::$brand;}

		$taskData = $config[strtolower($data)];
		$metaData = $taskData;

		if(!empty($metaData) && array_key_exists($meta, $metaData)){
			if($data=='description'){$task .= ' - ';}
			if($data=='keywords'){$task .= ', ';}
			$task .= $metaData[$meta];
		}
		else { //use default Tagline & Tags
			if($data=='description' && !empty(quin::$slogan)){$task .= ' - '.ucfirst(quin::$slogan);}
			if($data=='keywords' && !empty(quin::$basetag)){$task .= ', '.ucwords(quin::$basetag);}
		}

		#RETURN
		return $task;
	}

	public static function meta($use='quin', $distribution='global', $follow='no'){
 		#PREPARE
		$chore = '';
		$chore .='<meta name="distribution" content="'.$distribution.'">'."\n";

		if($use=='quin'){
			$chore ='<meta name="description" content="'.self::meta_data('description').' - '.self::domain_name().'">'."\n";
			$chore .='<meta name="keywords" content="'.self::meta_data('keywords').'">'."\n";
			if($follow=='yeah'){$robots ='index, follow';} else {$robots ='index, nofollow';}
			$chore .='<meta name="robots" content="'.$robots.'">'."\n";
		}
		if($use=='monstra'){
			$chore .='<meta name="description" content="'.baseurl::description().'">'."\n";
			$chore .='<meta name="keywords" content="'.baseurl::keywords().'">'."\n";
			$chore .='<meta name="robots" content="'.Page::robots().'">'."\n";
		}

		$chore .='<meta name="format-detection" content="telephone=no">'."\n";

		#RETURN
		echo $chore;
	}

	public static function favicon($path=''){
		#PREPARE & RESOLVE
		if(is_empty($path)){$path = PATH_FAVICON;}
		if(defined('REWRITE_URL') && REWRITE_URL=='yeah'){$path = self::site_url().PS.$path;}
		if(browser_info()=='ie' || browser_info()=='operamobi' || browser_info()=='operamini'){
			$chore ='<link rel="icon" type="image/x-icon" href="'.$path.PS.'favicon.ico">'."\n";
		} else {$chore ='<link rel="icon" type="image/png" href="'.$path.PS.'favicon.png">'."\n";}
		if(device::is() !='desktop'){
			$chore .='<link rel="apple-touch-icon-precomposed" href="'.$path.PS.'apple-touch-icon-precomposed.png">'."\n";
			$chore .='<link rel="apple-touch-icon" sizes="72x72" href="'.$path.PS.'apple-touch-icon-72x72.png">'."\n";
			$chore .='<link rel="apple-touch-icon" sizes="114x114" href="'.$path.PS.'apple-touch-icon-114x114.png">'."\n";
			$chore .='<link rel="apple-touch-icon" sizes="144x144" href="'.$path.PS.'apple-touch-icon-144x144.png">'."\n";
		}

		#RETURN
		echo $chore;
	}

	public static function css($flex='no', $ui='auto'){
		//prep for $version
		$ver = '';
		if(defined('DEVELOPMENT_STAGE') && DEVELOPMENT_STAGE=='yeah'){$ver = '?ver='.mt_rand();}

		//prep for $device
		$device = device::is();
		if($device=='phone'){$device ='smartphone';}

		//prep for $baseui
		if($ui=='auto'){$ui = self::$baseui;}
		if(!is_empty($ui)){$ui = $ui.'-';}
		$ui = PATH_CSS.PS.$ui;
		if(defined('REWRITE_URL') && REWRITE_URL=='yeah'){$ui = self::site_url().PS.$ui;}

		//prep for $chore
		$chore = '';
		$chore .='<link rel="stylesheet" type="text/css" href="'.PATH_CSS.PS.'stabilize.css'.$ver.'">'."\n";
		$chore .='<link rel="stylesheet" type="text/css" media="all" href="'.$ui.'global.css'.$ver.'">'."\n";

		if($flex =='device'){
			$chore .='<link rel="stylesheet" type="text/css" media="screen, projection" href="'.$ui.strtolower($device).'.css'.$ver.'">'."\n";
		} elseif ($flex =='responsive'){
			$chore .='<link rel="stylesheet" type="text/css" media="screen and (max-width: 480px)" href="'.$ui.'smartphone.css'.$ver.'">'."\n";
			$chore .='<link rel="stylesheet" type="text/css" media="only screen and (min-width:481px) and (max-width:768px)" href="'.$ui.'tablet.css'.$ver.'">'."\n";
			$chore .='<link rel="stylesheet" type="text/css" media="only screen and (min-width:769px)" href="'.$ui.'desktop.css'.$ver.'">'."\n";
		}
		if($device=='desktop' && validate_ie('<',9)){
			$chore .='<link rel="stylesheet" type="text/css" href="'.$ui.'ie8.css'.$ver.'">'."\n";
		}

		echo $chore;
	}

	public static function js($path=''){
		if(empty($path)){$path = PATH_JS;}
		if(defined('REWRITE_URL') && REWRITE_URL=='yeah'){$path = self::site_url().PS.$path;}
		$chore ='<script type="text/javascript" language="javascript" src="'.$path.PS.'jquery.js"></script>'."\n";
		$chore .='<script type="text/javascript" language="javascript" src="'.$path.PS.'html5.js"></script>'."\n";
		if(validate_ie('<', 9)){$chore .='<!--[if (gte IE 6)&(lte IE 8)]><script type="text/javascript" src="'.$path.PS.'selectivizr.js"></script><![endif]-->'."\n";}
		if(device::is()=='desktop' && validate_ie('<', 8)){$chore .='<!--[if lt IE 8]><style>.group {zoom:1;}</style><! [endif] -->'."\n";}
		echo $chore;
	}

	public static function spry($sprySet='', $set_path=''){

		if(empty($setpath)){$path['js'] = PATH_JS; $path['css'] = PATH_CSS;}
		else {$path['js'] = $set_path; $path['css'] = $set_path;}
		if(defined('REWRITE_URL') && REWRITE_URL=='yeah'){
			$path['js'] = self::site_url().PS.$path['js'];
			$path['css'] = self::site_url().PS.$path['css'];
		}

		$spryJS_TextField ='<script type="text/javascript" src="'.$path['js'].PS.'SpryValidationTextField.js"></script>'."\n";
		$spryJS_Password ='<script type="text/javascript" src="'.$path['js'].PS.'SpryValidationPassword.js"></script>'."\n";
		$spryJS_TextArea ='<script type="text/javascript" src="'.$path['js'].PS.'SpryValidationTextarea.js"></script>'."\n";
		$spryJS_Select ='<script type="text/javascript" src="'.$path['js'].PS.'SpryValidationSelect.js"></script>'."\n";
		$spryJS_CheckBox ='<script type="text/javascript" src="'.$path['js'].PS.'SpryValidationCheckbox.js"></script>'."\n";
		$spryJS_Radio ='<script type="text/javascript" src="'.$path['js'].PS.'SpryValidationRadio.js"></script>'."\n";
		$spryJS_Confirm ='<script type="text/javascript" src="'.$path['js'].PS.'SpryValidationConfirm.js"></script>'."\n";

		$spryCSS_TextField ='<link rel="stylesheet" type="text/css" href="'.$path['css'].PS.'SpryValidationTextField.css">'."\n";
		$spryCSS_Password ='<link rel="stylesheet" type="text/css" href="'.$path['css'].PS.'SpryValidationPassword.css">'."\n";
		$spryCSS_TextArea ='<link rel="stylesheet" type="text/css" href="'.$path['css'].PS.'SpryValidationTextarea.css">'."\n";
		$spryCSS_Select ='<link rel="stylesheet" type="text/css" href="'.$path['css'].PS.'SpryValidationSelect.css">'."\n";
		$spryCSS_CheckBox ='<link rel="stylesheet" type="text/css" href="'.$path['css'].PS.'SpryValidationCheckbox.css">'."\n";
		$spryCSS_Radio ='<link rel="stylesheet" type="text/css" href="'.$path['css'].PS.'SpryValidationRadio.css">'."\n";
		$spryCSS_Confirm ='<link rel="stylesheet" type="text/css" href="'.$path['css'].PS.'SpryValidationConfirm.css">'."\n";

		$sprySets = array('TextField','Password','TextArea','Select','CheckBox','Radio','Confirm');

		if(is_array($sprySet)){
			$prep = ''; $spryjs = ''; $sprycss = '';
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

		}
		else {
			$prep = "\n".$spryJS_TextField.$spryJS_Password.$spryJS_TextArea.$spryJS_Select.$spryJS_CheckBox.$spryJS_Radio.$spryJS_Confirm;
			$prep .= "\n".$spryCSS_TextField.$spryCSS_Password.$spryCSS_TextArea.$spryCSS_Select.$spryCSS_CheckBox.$spryCSS_Radio.$spryCSS_Confirm;
		}
		echo $prep;
	}

	public static function form_css($ui=''){
		if(!is_empty($ui)){$ui = $ui.'-';}
		$ui = PATH_CSS.PS.$ui;
		if(defined('REWRITE_URL') && REWRITE_URL=='yeah'){$ui = self::site_url().PS.$ui;}
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
			if(self::operation() != 'index'){$location .= clean_up(self::operation());}

			if($location == '_'){$location = 'index';}

			if($location != 'index'){
				$h1 .= string_swap($location, '_', ' '); $h1 = trim($h1);
				$h1 .= ' :: ';
			}
			$h1 .= self::$name;
			$h1 .= ' - '.self::$slogan;
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

			if(device::is()=='phone'){$brand = self::$squat;}
			elseif(device::is()=='tablet'){$brand = string_swap(self::$name, 'imited', 'td');}
			else {$brand = self::$brand;}

			$crumb .='<a href="'.self::site_url().'" title="'.self::$name.'" class="brand">'.$brand.'</a>';

			if(self::module() != 'index' && self::module() != 'page'){$module = clean_up(self::module());}
			if(self::operation() != 'index'){$operation = clean_up(self::operation());}
		}

		if(!is_empty($module) || !is_empty($operation)){$crumb .=' »';}
		if(!is_empty($module)){$crumb .=' '.$module;}
		if(!is_empty($operation)){$crumb .=' '.$operation;}
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
		if(empty($from) || $from =='none'){$from = '';} #TO DO (make sure entry is valid date)
		if(empty($to) || $to =='now'){$to = date("Y");}

		$copy ='&copy;';
		$prepLink ='';

		$prepLink ='<a href="'.self::site_url().'" class="brand"';
		$prepLink .=' title="'.self::$name;
		$prepLink .='">';


		$brand ='';
		if(device::is()=='phone'){
			$brand .= $prepLink;
			if(!empty(self::$acronym)){$brand .=self::$brand;}
		}
		elseif(device::is()=='tablet'){
			$brand .= $prepLink;
			$brand .= string_swap(self::$name, 'imited', 'td');
		}
		else{$brand .= $prepLink.self::$name;}

		$brand .='</a>';

		if(empty($from)){$chore = $copy.' <small>'.$to.'</small> '.$brand;}
		else {$chore = $copy.' '.$brand.' <small>'.$from.' - '.$to.'</small>';}
		if(!empty($reserved) && $reserved !='no'){$chore .= ' All rights reserved';}

		#DISPLAY RESULT
		return $chore;
	}

	public static function slide_img($name='1', $caption='', $alt=''){
		if(is_empty($alt) && !is_empty($name)){$alt = $name;}
		$slideapend = 'slide';
		if(device::is()=='phone'){$slideapend .='-phone';}
		if(device::is()=='tablet'){$slideapend .='-tablet';}
		if(device::is()=='desktop'){$slideapend .='-desktop';}

		$image = PATH_SLIDE.PS.$slideapend.'-'.$name.'.jpg';
		if(!found_file($image)){$image = PATH_BANNER.PS.'slide-'.$name.'.jpg';}
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