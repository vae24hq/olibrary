<?php
defined('SITE_OFFLINE') ? null : define('SITE_OFFLINE', 'no');
defined('DEVELOPMENT_STAGE') ? null : define('DEVELOPMENT_STAGE', 'no');
defined('REWRITE_URL') ? null : define('REWRITE_URL', 'no');

$config = array(
	'name'      => "JulianHodge Group",
	'squat'     => "JulianHodge",
	'brand'     => "JulianHodge™",
	'slogan'    => "we can help",
	'acronym'   => "JHG",

	'baseui'    => "",
	'baseurl'   => "jhbgroup.ga",
	'basetag'   => "",
	'basepath'  => "",
	'basemail'  => "",
	'basephone' => "",

	'mailadmin' => "",

	'dev_url'   => "",
	'dev_name'  => "",
	'dev_brand' => "",
	'dev_email' => ""
);

$config['title'] = array(
	// 'index'    => "home",
	// 'page_index' => "home page",
	'page_about-us' => "About The Group | JulianHodge™",
	'page_jhiam' => "JulianHodge Institute Of Applied Macroeconomics"
);

$config['description'] = array(
	// 'index'    => "official QUIN™",
	// 'page_about-me' => "biography of QUIN™"
);

$config['keywords'] = array(
	// 'index'    => "QUIN home, welcome QUIN™",
	// 'page_about-me' => "about QUIN™, QUIN™ biography"
);


defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('PS') ? null : define('PS', '/');

defined('ASSET') ? null : define('ASSET', 'asset');
	defined('PATH_BANNER') ? null : define('PATH_BANNER', ASSET);
	defined('PATH_FAVICON') ? null : define('PATH_FAVICON', ASSET);
	defined('PATH_CSS') ? null : define('PATH_CSS', ASSET);
	defined('PATH_JS') ? null : define('PATH_JS', ASSET);
	defined('PATH_SLIDE') ? null : define('PATH_SLIDE', ASSET);

defined('CONTENT') ? null : define('CONTENT', 'content');
	defined('DESIGN') ? null : define('DESIGN', CONTENT.DS.'design');
	defined('PIECE') ? null : define('PIECE', CONTENT.DS.'piece');
	defined('SUITE') ? null : define('SUITE', CONTENT.DS.'suite');
		defined('API') ? null : define('API', SUITE.DS.'api');
		defined('MODEL') ? null : define('MODEL', SUITE.DS.'model');
		defined('ORGANIZER') ? null : define('ORGANIZER', SUITE.DS.'organizer');
	defined('UI') ? null : define('UI', CONTENT.DS.'design');
	defined('VIEW') ? null : define('VIEW', CONTENT.DS.'view');

defined('LIBRARY') ? null : define('LIBRARY', 'library');

require(LIBRARY.DS.'_initialize.php');

quin::setting($config);
?>