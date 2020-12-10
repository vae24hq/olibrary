<?php
//========== DIRECTOR STRUCTURE ==========//
	# Define ENGINE DS
	defined('DOT') ? null : define('DOT', 'dot'.DS);
		defined('AUXIL') ? null : define('AUXIL', DOT.'auxil'.DS);
		defined('BOND') ? null : define('BOND', DOT.'bond'.DS);
		defined('CRUX') ? null : define('CRUX', DOT.'crux'.DS);

	# Using HTACCESS for PATH
	defined('ASSET') ? null : define('ASSET', 'asset'.PS);
	defined('JS') ? null : define('JS', 'js'.PS);
	defined('CSS') ? null : define('CSS', 'css'.PS);
	defined('AUDIO') ? null : define('AUDIO', 'audio'.PS);
	defined('VIDEO') ? null : define('VIDEO', 'video'.PS);
	defined('DOC') ? null : define('DOC', 'document'.PS);
	defined('IMG') ? null : define('IMG', 'image'.PS);
	defined('ICON') ? null : define('ICON', 'icon'.PS);
	defined('FONT') ? null : define('FONT', 'font'.PS);
	defined('PLUG') ? null : define('PLUG', 'plugin'.PS);
	defined('UPLOAD') ? null : define('UPLOAD', 'upload'.PS);

	# Define APP DS
	defined('DOTAPP') ? null : define('DOTAPP', 'app'.DS);
		defined('BUILD') ? null : define('BUILD', DOTAPP.'build'.DS);
			defined('SLICE') ? null : define('SLICE', BUILD.'slice'.DS);
			defined('VIEW') ? null : define('VIEW', BUILD.'view'.DS);
		defined('SUITE') ? null : define('SUITE', DOTAPP.'code'.DS);
			defined('API') ? null : define('API', SUITE.'api'.DS);
			defined('MODELIZR') ? null : define('MODELIZR', SUITE.'modelizr'.DS);
			defined('ORGANIZR') ? null : define('ORGANIZR', SUITE.'organizr'.DS);
			defined('UTILIZR') ? null : define('UTILIZR', SUITE.'utilizr'.DS);

	# Define APP's UPLOAD PATH
		defined('DATA') ? null : define('DATA', DOTAPP.'asset'.DS.'upload'.DS);

//========== LIBRARY ==========//
require DOTAPP.'design.php';
require CRUX.'session.php';
require CRUX.'is.php';
require AUXIL.'route.php';
require AUXIL.'file.php';
require AUXIL.'utility.php';

# APP CENTRIC LIBRARY
require(CRUX.'dot.php');
require(CRUX.'database.php');
require(AUXIL.'authen.php');

require(UTILIZR.'function.php');
?>