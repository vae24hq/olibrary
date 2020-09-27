<?php
/* erko™ framework ~ an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website;
 * Built by DeronEllse™ [@deronellse - www.deronellse.com/about] using PHP, MySQL, HTML, CSS, JS & derived technology.
 * © February 2016 | version 1.0
 * ===================================================================================================================
 * Dependency »
 * PHP | build::config ~ configuration
 */
defined('SITE_OFFLINE') ? null : define('SITE_OFFLINE', 'no');
defined('DEVELOPMENT_STAGE') ? null : define('DEVELOPMENT_STAGE', 'yeah');
defined('REWRITE_URL') ? null : define('REWRITE_URL', 'no');

$config = array(
	'name'      => "Newman Construction Limited",
	'squat'     => "Newman Limited",
	'brand'     => "Newman™",
	'slogan'    => "building together",
	'acronym'   => "NCL",
	
	'baseui'    => "",
	'baseurl'   => "nmc-ltd.com",
	'basetag'   => "",
	'basepath'  => "",
	'basemail'  => "",
	'basephone' => "",
	
	'mailadmin' => "",
	
	// developer's information
	'dev_url'   => "",
	'dev_name'  => "",
	'dev_brand' => "",
	'dev_email' => ""
);

$config['title'] = array();
$config['description'] = array();
$config['keywords'] = array();

// separators
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('PS') ? null : define('PS', '/');

// path definition
defined('ASSET') ? null : define('ASSET', 'asset');
	defined('PATH_BANNER') ? null : define('PATH_BANNER', ASSET.PS.'banner');
	defined('PATH_CSS') ? null : define('PATH_CSS', ASSET.PS.'css');
	defined('PATH_ICON') ? null : define('PATH_ICON', ASSET.PS.'icon');
	defined('PATH_JS') ? null : define('PATH_JS', ASSET.PS.'js');
	defined('PATH_MEDIA') ? null : define('PATH_MEDIA', ASSET.PS.'media');
	defined('PATH_SLIDE') ? null : define('PATH_SLIDE', ASSET.PS.'slide');

defined('BUILD') ? null : define('BUILD', 'build');
	defined('LAYOUT') ? null : define('LAYOUT', BUILD.DS.'layout');
	defined('PIECE') ? null : define('PIECE', BUILD.DS.'piece');
	defined('SUITE') ? null : define('SUITE', BUILD.DS.'suite');
		defined('API') ? null : define('API', SUITE.DS.'api');
		defined('MODEL') ? null : define('MODEL', SUITE.DS.'model');
		defined('ORGANIZER') ? null : define('ORGANIZER', SUITE.DS.'organizer');
	defined('VIEW') ? null : define('VIEW', BUILD.DS.'view');

defined('LIBRARY') ? null : define('LIBRARY', 'erko');
	defined('CORE') ? null : define('CORE', LIBRARY.DS.'core');
	defined('PLUG') ? null : define('PLUG', LIBRARY.DS.'plug');
	defined('UTIL') ? null : define('UTIL', LIBRARY.DS.'utility');

require(LIBRARY.DS.'initialyzr.php');

erko::setting($config);
require_once(BUILD.DS.'code.php');

require_once(UTIL.DS.'slide.php');


// include utilities as you require
#require_once(UTIL.DS.'ip.php');
#require_once(UTIL.DS.'format_size.php');
#require_once(UTIL.DS.'randomiz.php');
#require_once(UTIL.DS.'do_crypt.php');
?>