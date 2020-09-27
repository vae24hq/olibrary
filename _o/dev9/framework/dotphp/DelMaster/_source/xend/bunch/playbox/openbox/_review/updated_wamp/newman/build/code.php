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
		"name" => "railway",
		"caption" => "Railway construction project",
		"alt" => ""),
	2  => array(
		"name" => "drainage",
		"caption" => "Flood control project",
		"alt" => ""),
	3  => array(
		"name" => "reabilitation",
		"caption" => "Road reabilitation project",
		"alt" => ""),
	4  => array(
		"name" => "asphalt",
		"caption" => "Asphalt paving for reconstruction",
		"alt" => ""),
	5  => array(
		"name" => "road",
		"caption" => "Urban road construction project",
		"alt" => "")
	);


//custom functions
function isNav(){
	$markets = 'markets served';
	if(device::is()=='tablet'){
	$markets = 'markets';

	}
	$navlink = '';
	$navlink .= '<li>'.page_menu('about-us','about us').'</li>'."\n";
	$navlink .= '	<li>'.page_menu('asphalt-plants','asphalt plants').'</li>'."\n";
	$navlink .= '	<li>'.page_menu('construction','construction').'</li>'."\n";
	$navlink .= '	<li>'.page_menu('markets', $markets).'</li>'."\n";
	$navlink .= '	<li>'.page_menu('safety').'</li>'."\n";
	$navlink .= '	<li>'.page_menu('careers').'</li>'."\n";
	$navlink .= '	<li>'.page_menu('achievements').'</li>'."\n";
	$navlink .= '	<li';if(validate_ie('<', 9)){$navlink .= ' class="last"';}$navlink .='>'.page_menu('contact-us', 'contact us').'</li>'."\n";
	echo $navlink;
}
?>