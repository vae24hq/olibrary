	<?php
/* CYAR™ framework is an evolving library for rapid & efficient development of modem responsive static or dynamic website and applications.
 * Built and maintained at OIAVO™ using PHP, MySQL, HTML, CSS, JS & derived technology. Version 0.0.1 | CYAR™ Web framework © 2016
 * ========================================================================================================================================
 * PHP | piece::action ~ handle action related operations | Dependency » ~
 */

$action = $_GET['action'];

#for download action - sampling
if($action == 'download' && !isEmpty($_GET['file'])){
	return download($_GET['file']);	
}

#for redirect - sampling
if($action == 'redirect' && !isEmpty($_GET['location'])){
	$destination = 'http://'.$_GET['location'];
	return redirect($destination, 5);
}
?>