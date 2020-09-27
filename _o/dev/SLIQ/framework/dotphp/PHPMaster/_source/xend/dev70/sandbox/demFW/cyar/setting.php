<?php
/* CYAR™ framework is an evolving library for rapid & efficient development of modem responsive static or dynamic website and applications.
 * Built and maintained at OIAVO™ using PHP, MySQL, HTML, CSS, JS & derived technology. Version 0.0.1 | CYAR™ Web framework © 2016
 * ========================================================================================================================================
 * PHP | root::setting ~ custom settings & configuration
 */

//-------------- Default behaviour ---------------
defined('SET_MODE') ? null : define('SET_MODE', 2); #[offline-0|maintenance-1|development-2|testing-3|production-4]
defined('REWRITE_URL') ? null : define('REWRITE_URL', 'sure'); #[sure|nope]


//-------------- Project Information ---------------
$config = array(
	'name'     => "CYAR Web Framework",
	'squat'    => "CYAR Framework",
	'brand'    => "CYAR™",
	'slogan'   => "code your way",
	'acronym'  => "CYAR",
	'basepath' => "cyar",
	// 'domain'   => "www.oiavo.io",
	'theme'    => "",
	'phone'    => "",
	'admin'    => "",
	'mail'     => "",
	'tag'      => ""
);


//-------------- SEO Information ---------------
$config['title'] = array('demo' => "CYAR™ Demo");
$config['description'] = array('demo' => "A CYAR™ demonstration page");
$config['keywords'] = array('demo' => "demo, CYAR™ demonstration");
$config['heading'] = array('demo' => "A simple CYAR™ Demo");

//-------------- Include Initializer ---------------
require('core/init.php');


//-------------- Action operation ---------------
if(isset($_GET['action']) && !empty($_GET['action'])){
	$actionHandler = linkFile('code', 'action');
	includeFile($actionHandler);
}
?>