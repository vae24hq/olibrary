<?php
/* tydi3™ framework ~ an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website;
 * Built by SlimEdge™ [@officialSEID - www.seid.com.ng] using PHP, MySQL, HTML, CSS, JS & derived technology.
 * © July 2016 | version 1.0 (site framework)
 * ===================================================================================================================
 * Dependency »
 * PHP | init::tydi3 ~ initialization & custom settings
 */

//Pre-defined Constants
defined('SET_MODE') ? null : define('SET_MODE', 'development'); #[development|production|maintenance|offline]
defined('REWRITE_URL') ? null : define('REWRITE_URL', 'no');


//Configuration
$tydi3_config = array(
	'name'       => "Tydi3 Framework",
	'squat'      => "tydi3",
	'brand'      => "tydi3™",
	'slogan'     => "code your way",
	'acronym'    => "TYDI3",

	'baseui'     => "",
	'basetag'    => "",
	'basepath'   => "",
	'basemail'   => "",
	'basephone'  => "",
	'basedomain' => "",
	
	'webmaster'  => "", #[webmaster|webmaster@domain.com]
);

//SEO - 
$tydi3_config['title'] = array('demo'=>"Demo");
$tydi3_config['description'] = array('demo'=> "tydi3's demostration");
$tydi3_config['keywords'] = array('demo'=> "demo, demostration");


//Slide Image Information
$tydi3_slideImgData = array(
	1  => array(
		"name" => "chair",
		"caption" => "A stadium contains rows of Chairs",
		"alt" => "stadium chairs"),
	2  => array(
		"name" => "swing",
		"caption" => "Children enjoy the out doors on a swing",
		"alt" => "children swing"),
	3  => array(
		"name" => "tractor",
		"caption" => "Using a tractor on a farm is mechanised farming",
		"alt" => "tractor on a farm")
	);

//Separator
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('PS') ? null : define('PS', '/');

//Path Definition
defined('DIR_SOURCE') ? null : define('DIR_SOURCE', 'source');

	defined('ASSET') ? null : define('ASSET', DIR_SOURCE.PS.'asset');
		defined('DIR_UPLOAD') ? null : define('DIR_UPLOAD', ASSET.DS.'upload');
		defined('PATH_UPLOAD') ? null : define('PATH_UPLOAD', ASSET.PS.'upload');
		defined('PATH_SLIDE') ? null : define('PATH_SLIDE', ASSET.PS.'banner');
	
	defined('SLICE') ? null : define('SLICE', DIR_SOURCE.DS.'slice');
	defined('VIEW') ? null : define('VIEW', DIR_SOURCE.DS.'view');
	
defined('LIBRARY') ? null : define('LIBRARY', 'tydi3');
	defined('PLUG') ? null : define('PLUG', LIBRARY.DS.'plug');


//Include library
if(defined('SET_MODE') && SET_MODE != 'development'){error_reporting(0);}
elseif {error_reporting(E_ALL | E_STRICT);}

require_once LIBRARY.DS.'session.php';
Session::start();

require_once PLUG.DS.'mobile-detect.php';
#require_once(LIBRARY.DS.'function.php');
#core | plug | utility

// require_once(CORE.DS.'string.php');
// require_once(CORE.DS.'browser.php');
// require_once(CORE.DS.'period.php');
// require_once(CORE.DS.'link.php');
// require_once(CORE.DS.'device.php');
// require_once(CORE.DS.'erko.php');
?>