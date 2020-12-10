<?php
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
?>