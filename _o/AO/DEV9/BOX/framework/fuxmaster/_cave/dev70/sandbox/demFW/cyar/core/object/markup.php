<?php
/* CYAR™ framework is an evolving library for rapid & efficient development of modem responsive static or dynamic website and applications.
 * Built and maintained at OIAVO™ using PHP, MySQL, HTML, CSS, JS & derived technology. Version 0.0.1 | CYAR™ Web framework © 2016
 * ========================================================================================================================================
 * PHP | utility::markup ~ handles HTML mark-up operations | Dependency » utility {vital, browser}
 */

class markup {
	private static $instance;

	//-------------- Prevent multiple instances ---------------
	private function __construct(){return;}

	//-------------- Displays a single instance ---------------
	public static function instantiate(){
		if(is_null(self::$instance)){
			self::$instance = new self();
		}
		return self::$instance;
	}

	//-------------- Displays valid doc-type declaration ---------------
	public static function doctype(){
		if(getBrowser() == 'operamini' || getBrowser() == 'operamobi'){
			$doctype = '<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">';
		} elseif(isIE('<', 9)){$doctype = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">';}
		else {$doctype = '<!doctype html>';}
		echo $doctype."\n";
	}



/* ===========================================================================
 *  This section is for HTML HEAD operations
 * =========================================================================== */

	//-------------- Displays Returns valid charset ---------------
	public static function charset(){
 		if(isIE('<', 9)){$charset ='<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';} else {$charset ='<meta charset="utf-8">';}
 		echo "\t".$charset."\n";
 	}

	//-------------- Displays viewport ---------------
 	public static function viewport(){
 		if(
 			(device::identify() == 'phone' && device::is() == 'phone') ||
 			(device::identify() == 'tablet' && (device::is() == 'tablet' || device::is() == 'phone'))
 			){echo "\t".'<meta name="viewport" content="width=device-width">'."\n";}
	}

	//-------------- Displays XUA Compatible ---------------
	public static function XUA(){
 		if(isIE('==',9)){$XUA ='<meta http-equiv="X-UA-Compatible" content="IE=9" />';}
 		elseif(isIE('==',8)){$XUA ='<meta http-equiv="X-UA-Compatible" content="IE=8" />';}
 		elseif(isIE('>',9)){$XUA ='<meta http-eqbaseuiv="X-UA-Compatible" content="IE=edge">';} 		
 		if(!empty($XUA)){echo "\t".$XUA."\n";}
 	}

	//-------------- Displays page title ---------------
 	public static function title($value=''){
 		$title = cyar::title($value);
 		echo "\t".'<title>'.sentence($title).'</title>'."\n";
	}

	//-------------- Displays meta information ---------------
	public static function meta($distribution='global', $follow='follow'){
 		$meta = '';
 		if($distribution != 'nope'){$meta .= "\t".'<meta name="distribution" content="'.$distribution.'">'."\n";}
 		$meta .= "\t".'<meta name="description" content="'.cyar::meta('description').'">'."\n";
		$meta .= "\t".'<meta name="keywords" content="'.cyar::meta('keywords').'">'."\n";
		if($follow == 'follow'){$robots ='index, follow';} else {$robots = 'index, nofollow';}
		$meta .= "\t".'<meta name="robots" content="'.$robots.'">'."\n";
		if(device::identify() == 'desktop'){$meta .= "\t".'<meta name="format-detection" content="telephone=no">'."\n";} #identify the actual device
		echo $meta;
	}

	//-------------- Displays favicon resource link ---------------
	public static function favicon($path=''){
		$ver = ''; if(SET_MODE != 'production'){$ver = '?version='.mt_rand();}
		if(isEmpty($path)){$path = pathTo('favicon');}
		if(getBrowser() == 'ie'){$favicon = "\t".'<link rel="shortcut icon" type="image/x-icon" href="favicon.ico'.$ver.'">'."\n";}
		elseif(getBrowser() == 'operamobi' || getBrowser() == 'operamini'){
			$favicon = "\t".'<link rel="icon" type="image/x-icon" href="favicon.ico'.$ver.'">'."\n";
		} else {$favicon = "\t".'<link rel="icon" type="image/png" href="favicon.png'.$ver.'">'."\n";}		
		if(device::identify() != 'desktop'){
			$favicon .= "\t".'<link rel="apple-touch-icon-precomposed" href="'.$path.'apple-touch-icon-precomposed.png'.$ver.'">'."\n";
			$favicon .= "\t".'<link rel="apple-touch-icon" sizes="72x72" href="'.$path.'apple-touch-icon-72x72.png'.$ver.'">'."\n";
			$favicon .= "\t".'<link rel="apple-touch-icon" sizes="114x114" href="'.$path.'apple-touch-icon-114x114.png'.$ver.'">'."\n";
			$favicon .= "\t".'<link rel="apple-touch-icon" sizes="144x144" href="'.$path.'apple-touch-icon-144x144.png'.$ver.'">'."\n";
		}
		echo $favicon;
	}

	//-------------- Displays stylesheet resource link ---------------
	public static function stylesheet($flex='device', $theme='auto'){
		$ver = ''; if(SET_MODE == 2){$ver = '?version='.mt_rand();}

		#set device
		if($flex !='device' && !isEmpty($flex)){$device = $flex;}
		else {
			$device = device::is();
			if(isIE('<', 9)){$device = 'ie';}
			else {
				if($device == 'phone'){$device ='small';}
				elseif($device == 'tablet'){$device ='medium';}
				else {$device ='large';}
			}				
		}		

		#set theme
		if($theme == 'auto' && !isEmpty(cyar::$theme)){$theme = cyar::$theme;} else {$theme = '';}
		if(!isEmpty($theme)){$theme = $theme.'-';}	
		$theme = pathTo('styles').$theme;
		$link = '';
	
		#$link .= "\t".'<link rel="stylesheet" href="'.pathTo('styles').'clear.css'.$ver.'">'."\n"; #~remove to minimize http resource request
		if($flex == 'device' || $flex == 'query'){$link .="\t".'<link rel="stylesheet" media="all" href="'.$theme.'default.css'.$ver.'">'."\n";}
		if($flex != 'query'){$link .="\t".'<link rel="stylesheet" href="'.$theme.strtolower($device).'.css'.$ver.'">'."\n";}
		else {
			$link .="\t".'<link rel="stylesheet" media="screen and (max-width: 480px)" href="'.$theme.'small.css'.$ver.'">'."\n";
			$link .="\t".'<link rel="stylesheet" media="only screen and (min-width:481px) and (max-width:768px)" href="'.$theme.'medium.css'.$ver.'">'."\n";
			$link .="\t".'<link rel="stylesheet" media="only screen and (min-width:769px)" href="'.$theme.'large.css'.$ver.'">'."\n";
		}	
		if(isIE('<', 7)){$link .="\t".'<style type="text/css"> .group {height: 1%;}</style>'."\n";}
		elseif(isIE('==', 7)){$link .="\t".'<style type="text/css"> .group {display:inline-block;}</style>'."\n";}		
		echo $link;
	}

	//-------------- Displays javascript resource link ---------------
	public static function js($path='', $responsive='sure'){
		if(isEmpty($path)){$path = pathTo('javascript');}
		$js = "\t".'<script src="'.$path.'jquery.js"></script>'."\n";
		if(isIE('<', 9)){
			$js .= "\t".'<script src="'.$path.'html5.js"></script>'."\n";
			$js .= "\t".'<script src="'.$path.'selectivizr.js"></script>'."\n";
		}
		if($responsive == 'sure'){
			if(device::is() != 'desktop'){$js .= "\t".'<script src="'.$path.'nav.js"></script>'."\n";}
			$js .= "\t".'<script src="'.$path.'slides.js"></script>'."\n";
		}		
		echo $js;
	}

	//-------------- Displays spry resource link ---------------
	public static function spry($sprySet='', $set_path=''){
		if(isEmpty($set_path)){$path['js'] = pathTo('javascript'); $path['css'] = pathTo('styles');}
		else {$path['js'] = $set_path; $path['css'] = $set_path;}

		$spryJS_TextField ="\t".'<script src="'.$path['js'].'SpryValidationTextField.js"></script>'."\n";
		$spryJS_Password ="\t".'<script src="'.$path['js'].'SpryValidationPassword.js"></script>'."\n";
		$spryJS_TextArea ="\t".'<script src="'.$path['js'].'SpryValidationTextarea.js"></script>'."\n";
		$spryJS_Select ="\t".'<script src="'.$path['js'].'SpryValidationSelect.js"></script>'."\n";
		$spryJS_CheckBox ="\t".'<script src="'.$path['js'].'SpryValidationCheckbox.js"></script>'."\n";
		$spryJS_Radio ="\t".'<script src="'.$path['js'].'SpryValidationRadio.js"></script>'."\n";
		$spryJS_Confirm ="\t".'<script src="'.$path['js'].'SpryValidationConfirm.js"></script>'."\n";

		$spryCSS_TextField ="\t".'<link rel="stylesheet" href="'.$path['css'].'SpryValidationTextField.css">'."\n";
		$spryCSS_Password ="\t".'<link rel="stylesheet" href="'.$path['css'].'SpryValidationPassword.css">'."\n";
		$spryCSS_TextArea ="\t".'<link rel="stylesheet" href="'.$path['css'].'SpryValidationTextarea.css">'."\n";
		$spryCSS_Select ="\t".'<link rel="stylesheet" href="'.$path['css'].'SpryValidationSelect.css">'."\n";
		$spryCSS_CheckBox ="\t".'<link rel="stylesheet" href="'.$path['css'].'SpryValidationCheckbox.css">'."\n";
		$spryCSS_Radio ="\t".'<link rel="stylesheet" href="'.$path['css'].'SpryValidationRadio.css">'."\n";
		$spryCSS_Confirm ="\t".'<link rel="stylesheet" href="'.$path['css'].'SpryValidationConfirm.css">'."\n";

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

	//-------------- Displays stylesheet (form) resource link ---------------
	public static function styleForm($theme=''){
		if(!isEmpty($theme)){$theme = $theme.'-';} $theme = pathTo('styles').$theme;
		echo "\t".'<link rel="stylesheet" media="all" href="'.$theme.'form.css">'."\n";
	}



/* ===========================================================================
 *  This section is for HTML BODY operations
 * =========================================================================== */

	//-------------- Displays value for main heading ---------------
	public static function heading($value=''){
		if(isEmpty($value)){
			#get configure heading
			$config = cyar::$config; $route = route('trim'); $heading = $config['heading'];			
			$routeHeading = '';

			#if heading exist for page in global configuration
			if(!empty($heading) && array_key_exists($route, $heading)){$routeHeading .= $heading[$route];}
			else {
				if(!empty(cyar::$squat)){$routeHeading .= cyar::$squat;}

				#build heading for index page {making sure site name exist}				
				if($route == 'index'){if(!empty(cyar::$slogan)){$routeHeading .= ' - '.sentence(cyar::$slogan);}}
				elseif($route == 'welcome'){if(!empty(cyar::$name)){$routeHeading .= ' - Welcome to '.sentence(cyar::$name);}}
				else {		
					$routeHeading .= ' | ';
					$route = stringSwap($route, '_', ' » ');
					$routeHeading .= capitalize(cleanup($route));
				}			
			}
		}
		else {$routeHeading = $value;}		
		echo sentence($routeHeading);
	}


	//-------------- Displays CSS style ID name for body ---------------
	public static function cssID(){
		$cssID = route('trim');
		if($cssID == 'index' && !empty(cyar::$acronym)){$cssID = cyar::$acronym;}
		$cssID = capitalize(cleanup($cssID));
		$cssID = stringSwap($cssID, ' ', '-');
		echo strtolower($cssID);
	}


	//-------------- Displays date formatted responsively ---------------
	public static function date(){
		$device = device::is();
		if($device == 'phone'){$date = doDate('dateD1');}
		elseif($device == 'tablet'){$date = doDate('dateD3');}
		else {$date = doDate();}		
		echo $date;
	}


	//-------------- Displays breadcrumb responsively ---------------
	public static function breadcrumb($crumb=''){
		#build crumb
		if(isEmpty($crumb)){
			$brand = ''; $route = route(); $device = device::is(); $crumb = '';
			
			if($route == 'welcome'){$crumb .= 'Welcome to ';}
			
			#add brand name to breadcrumb
			if($device == 'phone' && !isEmpty(cyar::$squat)){$brand = stringSwap(cyar::$squat, 'imited', 'td');}
			elseif($device == 'tablet' && !isEmpty(cyar::$name)){$brand = stringSwap(cyar::$name, 'imited', 'td');}
			elseif(($route == 'index' || $route == 'welcome') && !isEmpty(cyar::$name)){$brand = cyar::$name;}
			elseif(!isEmpty(cyar::$brand)){$brand = cyar::$brand;}
			
			$crumb .='<a href="'.pathTo('index').'" title="'.cyar::$squat.'" class="brand">'.$brand.'</a>';

			#add page name to breadcrumb
			if($route != 'index' && $route != 'welcome'){
				if(!isEmpty($crumb) && $route != 'home'){$crumb .= ' »';}
				$route = trim($route);
				
				#check to remove trailing '/'
				$pos = posChar($route, '_', 'last');
				$length = strlen($route);
				if($length == $pos){$route = stringSwap($route, '_', '', 'last');}

				#toDO ~ add link to each breadcrumb

				$route = stringSwap($route, '_', ' → ');
				$route = cleanup($route);
				$route = wordAsCap($route);
				$route = capitalize($route);
				$crumb .= ' '.$route;
			}
		}		
		echo $crumb;
	}


	//-------------- Displays greeting responsively ---------------
	public static function greeting($remark='nope'){
		#build greeting
		$hour = date("H");
		if($hour < 12){$greeting = 'Good Morning!';}
		elseif($hour < 17){$greeting = 'Good Afternoon!';}
		else {$greeting = 'Good Evening!';}

		if($remark == 'sure'){
			$hasRemark = FALSE;
			if($hour > 2 && $hour < 7){$hasRemark = "You're up early";}
			elseif($hour > 21 || $hour < 3){$hasRemark = "You're up late";}
			if($hasRemark){$greeting = $hasRemark.' - <em>'.$greeting.'</em>';}
		}

		echo $greeting;
	}


	//-------------- Displays copyright branding responsively ---------------
	public static function copyright($from='', $reserved='nope', $to='now'){
		#TODO - make $from and $to is either empty or contains a valid date string		
		if($to == 'now'){$to = date("Y");}

		#prepare copy text
		$copy ='';
		if(device::is() != 'phone' && isEmpty($from)){$copy .='Copyright';}
		$copy .=' &copy;';
		
		#prepare link (open)
		$link = '<a href="'.pathTo('index').'" class="brand" title="'.cyar::$squat.'">';

		#prepare brand
		$brand ='';
		if(!isEmpty($link)){$brand .= $link;}

		if(device::is() == 'phone' && !isEmpty(cyar::$brand)){$brand .=cyar::$brand;}
		elseif(device::is() == 'tablet'  && !isEmpty(cyar::$brand)){
			$brand .= stringSwap(cyar::$name, 'imited', 'td');
		}
		elseif(!isEmpty(cyar::$name)){$brand .= cyar::$name;}

		#prepare link (closing tag)
		if(!isEmpty($link)){$brand .='</a>';}
		
		#prepare result (add time-line)
		if(isEmpty($from)){$copyright = $copy.' '.$to.' '.$brand;}
		else {$copyright = $brand.' '.$copy.' '.$from.' - '.$to;}

		#add rights
		if($reserved == 'sure'){$copyright .= ' All rights reserved';}

		echo $copyright;
	}



/* ===========================================================================
 *  This section is for special HTML content
 * =========================================================================== */

	//-------------- Displays HTML notification ---------------
	public static function notify($msg='', $class='notice', $wrap='span'){
		if(!isEmpty($msg)){
			$notify = $msg;
			if(!isEmpty($wrap)){
	 			$wrap = strtolower($wrap);
				$prep_wrap = '<'.$wrap;
				if(!isEmpty($class)){
	 				$class = strtolower($class);
					$prep_class = ' class="'.$class.'"';
					$prep_wrap .= $prep_class;
				}
				$prep_wrap .= '>'.$msg.'</'.$wrap.'>';
				$notify = $prep_wrap;
			}
			echo $notify;
			return;
		}
		return FALSE;
	}

	//-------------- Displays unsupported browser notice ---------------
	public static function stale($browser=''){
		$stale = '	<div class="stale-browser">'."\n";
		$stale .= '	<h2>Unsupported Browser!</h2>'."\n";
		$stale .= '	<p>Oops!, we are sorry for this awkwardness. <br>You appear to be using a ';
		if($browser == 'ie'){$stale .= 'very stale version of <strong>Internet Explorer</strong> ';}
		else {$stale .= 'browser or a very stale version of a browser. ';}	
		$stale .= 'that we do not support. <br>Please upgrade to a more recent version or download other modern browsers. <br>'."Don't know where to start? - Try ".link::external('http://www.google.com', 'Google™', '', 'Search with Google.com').'</p>'."\n";
		$stale .= '	<p>You may reach us at <a href="mailto:'.cyar::$admin.'" target="_blank" class="email">'.cyar::$admin.'</a></p>'."\n";
		$stale .= '	</div>'."\n";
		echo $stale;
	}

	//-------------- Displays document not available notice ---------------
	public static function unavailable($document='', $type='', $link=''){
		$msg = '';
		$msg .= '<h4>Missing';
		if(!isEmpty($type)){$msg .= ' '. ucfirst($type).' ';} else {$msg .= ' Document';}
		$msg .= '</h4>';
		$msg .= '<p class="paragraph"><i>The requested document ';
		if(!isEmpty($document)){$msg .= '<b>"'.$document.'"</b>';}
		$msg .= ' is unavailable</i></p>';
		if(SET_MODE == 2){$msg .= '<hr><pre><tt><b>Name:</b> '.$document."\t".'<b>Type:</b> '.$type."\t".'<b>File:</b> '.$link.'</tt></pre>';}
		return self::notify($msg, 'error', 'div');
	}


	//-------------- Displays option to switch rendition ---------------
	public static function rendition(){
		$render = '<div class="rendition">'."\n";
		$render .= '<ul class="navigation">'."\n";
		
		#toDo ~ $render .= 'Switch'; if(Device::is() != 'phone'){$render .= ' to';} $render .= ': ';

		if(device::is() == 'phone' || device::is() == 'tablet'){
			$render .= '<li>'.link::render('desktop').'</li>'."\n";
		} else {
			$render .= '<li>'.link::render('tablet').'</li>'."\n";
		}
		$render .= '<li';if(isIE('<', 9)){$render .= ' class="last"';} $render .='>';
		if(device::is() == 'phone'){$render .= link::render('tablet');}
		elseif(device::is() == 'tablet'){$render .= link::render('phone');}
		else {$render .= link::render('phone');}
		$render .= '</li>'."\n".'</ul>'."\n".'</div>'."\n";
		echo $render;
	}

} //************ End of class ~ Mark-up ************//
?>