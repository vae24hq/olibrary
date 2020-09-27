<?php
function oauthen(){
	session::start();
	if(isset($_SESSION['userbind'])){

		header('Location: dashboard');
		exit;
	}
	header('Location: login');
	exit;
}
?>