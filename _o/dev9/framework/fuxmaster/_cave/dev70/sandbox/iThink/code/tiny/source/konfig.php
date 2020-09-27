<?php
//========== CONFIGURATION ==========//
$o_config = array(
/*---------- Application Setting ----------*/
	'firm'    => 'Tiny Application Framework',
	'abbr'    => 'TinyApp Framework',
	'brand'   => 'TinyApp',
	'acronym' => 'TAF',
	'slogan'  => 'Slim, Simple And Efficient',

	// 'path'    => '/tinyapp/',
	// 'url'     => 'https://www.tiny.fr', #Required else default will be used
	// 'domain'  => 'tiny.fr',
	// 'email'   => 'info@tiny.fr',

	'phone'   => '+234 (902) 663 6728',

	'imposeSSL' => 'yeah', #yeah|nope
	'rewriteURL' => 'yeah', #yeah|nope
	'mode' => 'live', #live|offline|maintenance
	'environ' => 'tiny', #tiny|prod|zbug

/*---------- Database Setting ----------*/
	'dbase' => array(
		// 'host' => 'localhost',
		// 'database' => 'devdb',
		// 'user' => 'root',
		// 'password' => ''
	),

/*---------- Page Title ----------*/
	'title' => array(
		'home' => 'Home',
		'about-us' => 'About Us',
		'contact' => 'Contact Us'
	),

/*---------- Page Heading ----------*/
	'heading' => array(),

/*---------- Page Description ----------*/
	'description' => array(),

/*---------- Page Keywords ----------*/
	'keywords' => array()
);


//========== SEPARATOR ==========//
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('PS') ? null : define('PS', '/');


//========== DIRECTOR STRUCTURE ==========//
defined('SOURCE') ? null : define('SOURCE', 'source');
	defined('THEME') ? null : define('THEME', SOURCE.DS.'build'.DS.'layout'.DS.'interface'.DS);
	defined('SNIPPET') ? null : define('SNIPPET', SOURCE.DS.'build'.DS.'layout'.DS.'snippet'.DS);
	defined('VIEW') ? null : define('VIEW', SOURCE.DS.'build'.DS.'layout'.DS.'view'.DS);

	defined('MODELIZR') ? null : define('MODELIZR', SOURCE.DS.'build'.DS.'suite'.DS.'modelizr'.DS);
	defined('ORGANIZR') ? null : define('ORGANIZR', SOURCE.DS.'build'.DS.'suite'.DS.'organizr'.DS);
	defined('UTILIZR') ? null : define('UTILIZR', SOURCE.DS.'build'.DS.'suite'.DS.'utilizr'.DS);

	defined('CSS') ? null : define('CSS', SOURCE.PS.'css'.PS);
	defined('IMG') ? null : define('IMG', SOURCE.PS.'image'.PS);
	defined('JS') ? null : define('JS', SOURCE.PS.'js'.PS);
	defined('MEDIA') ? null : define('MEDIA', SOURCE.PS.'media'.PS);
?>