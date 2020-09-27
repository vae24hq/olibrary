<?php
/* erko™ framework ~ an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website;
 * Built by DeronEllse™ [@deronellse - www.deronellse.com/about] using PHP, MySQL, HTML, CSS, JS & derived technology.
 * © February 2016 | version 1.0
 * ===================================================================================================================
 * Dependency »
 * PHP | rendition::utility ~ for switching to alternate device renditions
 */

function render($device='desktop'){
	if(is_empty($device)){$device = 'desktop';}

	#prepare
	$link = self_link();
	if(in_string($link, '?')){$link .='&';} else {$link .='?';}
	$link .= 'v='.$device;

	$chore = '<a href="'.$link.'" title="switch to '.$device.'" class="renderlink">'.$device.'</a>';
	
	#return result
	return $chore;
}
?>