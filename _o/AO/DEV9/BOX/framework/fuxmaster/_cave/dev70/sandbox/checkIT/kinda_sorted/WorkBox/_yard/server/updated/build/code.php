<?php
/* erko™ framework ~ an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website;
 * Built by DeronEllse™ [@deronellse - www.deronellse.com/about] using PHP, MySQL, HTML, CSS, JS & derived technology.
 * © February 2016 | version 1.0
 * ===================================================================================================================
 * Dependency »
 * PHP | build::plus ~ contains additional functions related to program
 */


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
	$refund_label = 'refund policy';
	$faq_label = 'support & faq';
	$contact_label = 'contact us';

	if(device::is()=='phone'){
	$contact_label = 'contact';
	}
	if(device::is()=='tablet' || device::is()=='phone'){
	$refund_label = 'refund';
	$faq_label = 'faq';
	}


	$navlink = '';
	$navlink .= '<li>'.page_menu('home').'</li>'."\n";
	
	if(device::is()!='phone' || (device::is()=='phone' && $pos!='footer')){
	$navlink .= '	<li>'.page_menu('about-us','about us').'</li>'."\n";
	$navlink .= '	<li>'.page_menu('services').'</li>'."\n";
	}

	if($pos=='main'){
	$navlink .= '	<li>'.page_menu('products').'</li>'."\n";
	$navlink .= '	<li>'.page_menu('media').'</li>'."\n";
	$navlink .= '	<li>'.page_menu('latest-supply', 'latest supply').'</li>'."\n";
	}

	if($pos=='footer'){
		if(device::is()!='phone'){
$navlink .= '	<li>'.markup_absurl('http://sms.whosco.com', 'sms', 'menu', 'send sms').'</li>'."\n";
if(device::is()!='tablet'){
	$navlink .= '	<li>'.markup_absurl('http://whosco.com:2095', 'webmail', 'menu', 'check mail').'</li>'."\n";
}
		} //if not phone

	$navlink .= '	<li>'.page_menu('terms-of-use', 'terms', 'terms of use').'</li>'."\n";
	$navlink .= '	<li>'.page_menu('privacy-policy', 'privacy', 'privacy policy').'</li>'."\n";
	$navlink .= '	<li>'.page_menu('refund-policy', $refund_label, 'refund policy').'</li>'."\n";
	}

	$navlink .= '	<li>'.page_menu('support-and-faq', $faq_label).'</li>'."\n";

	$navlink .= '	<li';if(validate_ie('<', 9)){$navlink .= ' class="last"';}$navlink .='>'.page_menu('contact-us', $contact_label, 'contact us').'</li>'."\n";
	echo $navlink;
}
?>