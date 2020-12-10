<?php
require_once(LIBRARY.DS.'session.php');
session::start();

require_once(LIBRARY.DS.'ip.php');
require_once(LIBRARY.DS.'detect.php');

require_once(LIBRARY.DS.'print_msg.php');
require_once(LIBRARY.DS.'tool.php');
require_once(LIBRARY.DS.'string.php');

require_once(LIBRARY.DS.'redirect.php');
require_once(LIBRARY.DS.'do_rand.php');
require_once(LIBRARY.DS.'do_crypt.php');

require_once(LIBRARY.DS.'browser.php');
require_once(LIBRARY.DS.'period.php');
require_once(LIBRARY.DS.'link.php');
require_once(LIBRARY.DS.'device.php');
require_once(LIBRARY.DS.'quin.php');

require_once(LIBRARY.DS.'e404.php');

//REDIRECT FROM URL
if((!empty($_REQUEST['action'])) && $_REQUEST['action'] == 'redirect'){
	$destination = quin::site_url();
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
?>