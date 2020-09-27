<?php
require_once 'setting.php';

// Handles access authentication
function controller(){
	$location = fileInfo();
	$allowed = array ('client', 'admin');
	if(!in_array($location, $allowed)){$location = 'client';}
	
	if(isset($_SESSION['email']) && isset($_SESSION['type'])){
		$email = ''; $type = 'client';
		if(!empty($_SESSION['email']) && !empty($_SESSION['type'])){
			$email = $_SESSION['email'];
			$type = $_SESSION['type'];
		}

		if(!authenticate($email, $type)){
			session::reset();
			header('Location: '.$type.'-login.php');
			exit();
		}
		elseif($type != $location){
			header('Location: '.$type.'.php');
			exit();
		}
	} else {
		session::reset();
		header('Location: '.$location.'-login.php');
		exit();
	}
}

controller();
$userActive = userActive();
?>