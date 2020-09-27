<?php
/* erko™ framework ~ an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website;
 * Built by DeronEllse™ [@deronellse - www.deronellse.com/about] using PHP, MySQL, HTML, CSS, JS & derived technology.
 * © February 2016 | version 1.0
 * ===================================================================================================================
 * Dependency »
 * PHP | build::settings ~ contains custom settings & additional functions related to program
 */

defined('SITE_OFFLINE') ? null : define('SITE_OFFLINE', 'no');
defined('DEVELOPMENT_STAGE') ? null : define('DEVELOPMENT_STAGE', 'yeah');
defined('REWRITE_URL') ? null : define('REWRITE_URL', 'no');

//configuration
$config = array(
	'name'      => "Whosco Ventures Limited",
	'squat'     => "Whosco Limited",
	'brand'     => "Whosco™",
	'slogan'    => "a commitment to excellence",
	'acronym'   => "Whosco",
	
	'baseui'    => "",
	'baseurl'   => "",
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

//SEO - doesn't work on link (./?link=name | /link/name)
$config['title'] = array();
$config['description'] = array();
$config['keywords'] = array();


// Slide Banner Data
$bannerImgData = array(
	1  => array(
		"name" => "1",
		"caption" => "You will find rows of chairs on a stadium",
		"alt" => "stadium chairs"),
	2  => array(
		"name" => "2",
		"caption" => "Children enjoy the out doors on a swing",
		"alt" => "swing"),
	3  => array(
		"name" => "3",
		"caption" => "Using a tractor on a farm is mechanised farming",
		"alt" => "tractor")
	);


//custom functions
function isNav($pos='main'){
	$faq_label = 'support & faq';
	$contact_label = 'contact us';

	if(device::is()=='phone' && $pos=='footer'){
		$contact_label = 'contact';
	}
	if(device::is()=='tablet'){
		$contact_label = 'contact';
	}

	if(device::is()=='desktop' && device::identify()=='tablet'){
		$contact_label = 'contact';
	}

	if(device::is()=='tablet' || device::is()=='phone'){
		$faq_label = 'faq';
	}

	$navlink = '<li>'.page_menu('home').'</li>'."\n";

	if(device::is()!='phone' || (device::is()=='phone' && $pos!='footer')){
		$navlink .= '	<li>'.page_menu('about-us','about us').'</li>'."\n";
		$navlink .= '	<li>'.page_menu('services').'</li>'."\n";
	}

	if($pos=='main'){
		$navlink .= '	<li>'.page_menu('products', 'products gallery').'</li>'."\n";
		$navlink .= '	<li>'.page_menu('media').'</li>'."\n";
		$navlink .= '	<li>'.page_menu('latest-supply', 'latest supply').'</li>'."\n";
	}

	if($pos=='footer'){
		if(device::is()!='phone'){
			$navlink .= '	<li>'.markup_absurl('http://sms.whosco.com', 'sms', 'menu', 'send sms').'</li>'."\n";
			$navlink .= '	<li>'.markup_absurl('http://whosco.com:2095', 'webmail', 'menu', 'check mail').'</li>'."\n";
		} //end if not phone

		$navlink .= '	<li>'.page_menu('legal-information', 'legal', 'legal information').'</li>'."\n";
	}

	//hide if device is tablet and redition request is desktop
	if((device::is()=='desktop' && device::identify()!='tablet') || device::is()=='phone' || device::is()=='tablet'){
		$navlink .= '	<li>'.page_menu('support-and-faq', $faq_label).'</li>'."\n";
	}

	if(device::is()=='phone' && $pos !='footer'){
		$navlink .= '	<li><a href="#search" title="search for products" class="menu">search</a></li>'."\n";
	}
	$navlink .= '	<li';
	if(validate_ie('<', 9)){$navlink .= ' class="last"';}$navlink .='>'.page_menu('contact-us', $contact_label, 'contact us').'</li>'."\n";
	echo $navlink;
}

class mydb3 extends SQLite3 {
	function __construct(){
		$dbfile = DATAHOUSE.erko::acronym.'db3';
		$this->open($dbfile);
	}
}
?>