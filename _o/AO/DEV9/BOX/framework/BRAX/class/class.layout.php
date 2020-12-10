<?php
/* Quiqway™ - a rapid web development platform by iO™ (inspired cirqle)
 * © April 2015 | version 2.0
 * PHP | class::layout ~ handles layout
 */

#require_once(DIR_CLASS.DS.'device.php');
#require_once(DIR_CLASS.DS.'loader.php');
#require_once(DIR_CLASS.DS.'meta.php');
#require_once(DIR_UTILITY.DS.'doc.php');

class Layout {
	private static $Device;
	private static $Desktop;

	function __construct(){
		self::$Device = Device::IsA();
		if(self::$Device=='desktop'){self::$Desktop = TRUE;}
		else{self::$Desktop = FALSE;}
		return;
	}

	public static function UI($ui='quiqway'){
		#ERROR CHECK
		if(empty($ui)){return FALSE;}

		#PREPARE
		$prep = '';
		if(defined('DIR_INTERFACE') && DIR_INTERFACE){$prep .= DIR_INTERFACE.DS;}
		$prep .= $ui.'.php';
		if(isFound($prep)){include($prep);}
		else {
			$error = '<br>Error: piece ['.$ui.'] not found<br>';
			if(ENVIRONMENT=='dev'){$error .= 'Interface: '.$prep;}
			echo $error;
		}
		echo "\n"; return;
	}

	public static function Slice($piece=''){
		#ERROR CHECK
		if(empty($piece)){return FALSE;}

		#PREPARE
		$prep = '';
		if(defined('DIR_SLICE') && DIR_SLICE){$prep .= DIR_SLICE.DS;}
		$prep .= $piece.'.php';
		if(isFound($prep)){include($prep);}
		else {
			$error = '<br>Error: piece ['.$piece.'] not found<br>';
			if(ENVIRONMENT=='dev'){$error .= 'File: '.$prep;}
			echo $error;
		}
		echo "\n"; return;
	}

	public static function Nav($navPiece=''){
		#ERROR CHECK
		if(empty($navPiece)){return FALSE;}

		#PREPARE
		$prep = '';
		if(defined('DIR_SLICE') && DIR_SLICE){$prep .= DIR_SLICE.DS.'nav-'.$navPiece;}
		$prep = $prep.'.php';
		if(file_exists($prep)){include($prep);}
		else {
			$error = '<br>Error: nav ['.$navPiece.'] not found<br>';
			if(ENVIRONMENT=='dev'){$error .= 'File: '.$prep;}
			echo $error;
		}
		echo "\n"; return;
	}

	public static function Spry($sprySet=''){
		$spryJS_TextField = '<script type="text/javascript" src="'.DIR_SPRY.FS.'SpryValidationTextField.js"></script>'."\n";
		$spryJS_Password = '<script type="text/javascript" src="'.DIR_SPRY.FS.'SpryValidationPassword.js"></script>'."\n";
		$spryJS_TextArea = '<script type="text/javascript" src="'.DIR_SPRY.FS.'SpryValidationTextarea.js"></script>'."\n";
		$spryJS_Select = '<script type="text/javascript" src="'.DIR_SPRY.FS.'SpryValidationSelect.js"></script>'."\n";
		$spryJS_CheckBox = '<script type="text/javascript" src="'.DIR_SPRY.FS.'SpryValidationCheckbox.js"></script>'."\n";
		$spryJS_Radio = '<script type="text/javascript" src="'.DIR_SPRY.FS.'SpryValidationRadio.js"></script>'."\n";
		$spryJS_Confirm = '<script type="text/javascript" src="'.DIR_SPRY.FS.'SpryValidationConfirm.js"></script>'."\n";

		$spryCSS_TextField = '<link rel="stylesheet" type="text/css" href="'.DIR_SPRY.FS.'SpryValidationTextField.css">'."\n";
		$spryCSS_Password = '<link rel="stylesheet" type="text/css" href="'.DIR_SPRY.FS.'SpryValidationPassword.css">'."\n";
		$spryCSS_TextArea = '<link rel="stylesheet" type="text/css" href="'.DIR_SPRY.FS.'SpryValidationTextarea.css">'."\n";
		$spryCSS_Select = '<link rel="stylesheet" type="text/css" href="'.DIR_SPRY.FS.'SpryValidationSelect.css">'."\n";
		$spryCSS_CheckBox = '<link rel="stylesheet" type="text/css" href="'.DIR_SPRY.FS.'SpryValidationCheckbox.css">'."\n";
		$spryCSS_Radio = '<link rel="stylesheet" type="text/css" href="'.DIR_SPRY.FS.'SpryValidationRadio.css">'."\n";
		$spryCSS_Confirm = '<link rel="stylesheet" type="text/css" href="'.DIR_SPRY.FS.'SpryValidationConfirm.css">'."\n";

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
		echo $prep; return;
	}
	
	public static function MetaData($follow='nah', $distribution='global'){
		if(!empty($distribution)){$distribution = '<meta name="distribution" content="'.$distribution.'">'."\n";}
		$prep = '';
		$prep = '<meta name="description" content="'.Meta::Data('description').'">'."\n";
		$prep .= '<meta name="keywords" content="'.Meta::Data('keywords').'">'."\n";
		if(!empty($follow)){
			if($follow=='yeah'){$prep .= '<meta name="robots" content="index, follow">'."\n";}
			if($follow=='nah'){$prep .= '<meta name="robots" content="index, nofollow">'."\n";}
		}
		if(!self::$Desktop){$prep .= '<meta name="format-detection" content="telephone=no">'."\n";}
		$prep .= '<meta name="developer" content="Erku Cliqwire ~ iam@erkucliq.com [http://erkucliq.com/iam]">'."\n";
		echo $distribution.$prep;
	}

	public static function InHead($section=''){
		if(!empty($section)){
			if($section=='css'){$section = 'CSS';}
			elseif($section=='cssFlex'){$section = 'CSSFlex';}
			else {$section = ucfirst($section);}
			$section;
			return self::$section();
		}
		else {return FALSE;}
	}	

	public static function CSS($ui=''){
		if(!empty($ui)){$ui = $ui.'-';}
		$prep = '<link rel="stylesheet" type="text/css" media="all" href="'.DIR_SCRIPT.FS.'stabilize.css">'."\n";
		$prep .= '<link rel="stylesheet" type="text/css" media="screen, projection" href="'.DIR_CSS.FS.$ui.'base.css">'."\n";		
		$ie = Device::IsIE();
		if($ie && $ie<9){$prep .= '<link rel="stylesheet" type="text/css" href="'.DIR_CSS.FS.$ui.'ie8-down.css">'."\n";}
		else {
		$prep .= '<link rel="stylesheet" type="text/css" media="screen, projection"';
		$prep .= ' href="'.DIR_CSS.FS.$ui.strtolower(self::$Device).'.css">'."\n";
		}
		echo $prep;
	}

	public function CSSFlex($ui=''){
		if(!empty($ui)){$ui = $ui.'-';}
		$prep = '<link rel="stylesheet" type="text/css" media="all" href="'.DIR_SCRIPT.FS.'stabilize.css">'."\n";		
		$prep .= '<link rel="stylesheet" type="text/css" media="all" href="'.DIR_CSS.FS.$ui.'base.css">'."\n";
		$ie = Device::IsIE();
		if($ie && $ie<9){$prep .= '<link rel="stylesheet" type="text/css" href="'.DIR_CSS.FS.$ui.'ie8-down.css">'."\n";}
		else {
		$prep .= '<link rel="stylesheet" type="text/css" media="screen and (max-width: 480px)" href="'.DIR_CSS.FS.$ui.'phone.css">'."\n";
		$prep .= '<link rel="stylesheet" type="text/css" media="only screen and (min-width:481px) and (max-width:768px)" href="'.DIR_CSS.FS.$ui.'tablet.css">'."\n";
		$prep .= '<link rel="stylesheet" type="text/css" media="only screen and (min-width:769px)" href="'.DIR_CSS.FS.$ui.'desktop.css">'."\n";
		}
		echo $prep; var_dump($ie);
	}

	public function FormCSS($ui=''){
		if(!empty($ui)){$ui = $ui.'-';}
		$prep = '<link rel="stylesheet" type="text/css" media="all" href="'.DIR_CSS.FS.$ui.'form.css">'."\n";		
		echo $prep; return;
	}

	private function Viewport(){
		if(!self::$Desktop){
			echo '<meta name="viewport" content="width=device-width, minimum-scale=0.5, maximum-scale=3.5">'."\n";
		}
		return;
	}

	private function Favicon(){
		$ie = Device::IsIE();
		if($ie){
			$prep = '<link rel="shortcut icon" type="image/x-icon" href="'.DIR_FAVICON.FS.'favicon.ico">'."\n";
		} else {
			$prep = '<link rel="shortcut icon" type="image/png" href="'.DIR_FAVICON.FS.'favicon.png">'."\n";
		}
		if(!self::$Desktop){
			$prep .= '<link rel="apple-touch-icon-precomposed" href="'.DIR_FAVICON.FS.'apple-touch-icon-precomposed.png">'."\n";
			$prep .= '<link rel="apple-touch-icon" sizes="72x72" href="'.DIR_FAVICON.FS.'apple-touch-icon-72x72.png">'."\n";
			$prep .= '<link rel="apple-touch-icon" sizes="114x114" href="'.DIR_FAVICON.FS.'apple-touch-icon-114x114.png">'."\n";
			$prep .= '<link rel="apple-touch-icon" sizes="144x144" href="'.DIR_FAVICON.FS.'apple-touch-icon-144x144.png">'."\n";
		}
		echo $prep;
	}

	private function Js(){
		$jsprep = '<script type="text/javascript" language="javascript" src="'.DIR_JS.FS.'jquery.js"></script>'."\n";
		$jsprep .= '<script src="'.DIR_JS.FS.'html5shiv.js"></script>'."\n";
		$ie = Device::IsIE();
		if($ie && $ie<9){
		//emulates CSS3 pseudo-classes and attribute selectors in Internet Explorer 6-8
		$jsprep .= '<!--[if (gte IE 6)&(lte IE 8)]><script type="text/javascript" src="'.DIR_JS.FS.'selectivizr.js"></script><![endif]-->'."\n";
		$jsprep .= '<!--[if lt IE 8]><style>.group {zoom:1;}</style><! [endif] -->'."\n";
		}
		echo $jsprep;
	}
}

$Layout = new Layout;
?>