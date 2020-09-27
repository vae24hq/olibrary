<?php
/* erko™ framework ~ an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website;
 * Built by DeronEllse™ [@deronellse - www.deronellse.com/about] using PHP, MySQL, HTML, CSS, JS & derived technology.
 * © February 2016 | version 1.0
 * ===================================================================================================================
 * Dependency »
 * PHP | initialyzr::erko ~ initiliazation
 */
require_once(CORE.DS.'session.php');
session::start();

require_once(PLUG.DS.'detect.php');

require_once(CORE.DS.'tool.php');
require_once(CORE.DS.'string.php');
require_once(CORE.DS.'browser.php');
require_once(CORE.DS.'period.php');
require_once(CORE.DS.'link.php');
require_once(CORE.DS.'device.php');
require_once(CORE.DS.'erko.php');


//REDIRECT FROM URL
if((!empty($_REQUEST['action'])) && $_REQUEST['action'] == 'redirect'){
	$destination = erko::site_url();
	$location = $_GET['location'];
	if(!empty($location)){
		if(in_string($location,'www.')){
			 redirect('http://'.$location);
		}
		else {
			$destination .= PS.$location;
			redirect($destination);
		}
	}
}


if((!empty($_REQUEST['action'])) && $_REQUEST['action'] == 'download'){

	if(!empty($_GET['file'])){$data = $_GET['file'];}
	$data = clean_up($data);
	$data = strip_clean($data);
	$data = string_swap($data, '/','');
	if($data =='demo') {$file = 'demo.txt';}

	if(file_found($file)){
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename ="'.basename($file).'"');
		readfile($file);
		exit;
	}
}
?>